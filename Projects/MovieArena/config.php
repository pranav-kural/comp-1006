<?php

  require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/MovieArena/vendors/php-activerecord/ActiveRecord.php';

  if ( preg_match('/gc200333253\.computerstudi\.es/i', $_SERVER['HTTP_HOST']) ) {
    // remote server
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $config['host'] = 'sql.computerstudi.es';
    $config['dbname'] = 'gc200333253';
    $config['user'] = 'gc200333253';
    $config['password'] = '3C^TL5rT';
  } else { // localhost
    $config['host'] = 'localhost';
    $config['dbname'] = 'db_php_project02';
    $config['user'] = 'root';
    $config['password'] = '';
  }

  $config['model_directory'] = $_SERVER['DOCUMENT_ROOT'] . '/Project/MovieArena/models';

  ActiveRecord\Config::initialize( function( $cfg ) use ( $config ) {
    $cfg->set_model_directory( $config['model_directory'] );
    $cfg->set_connections( 
      array(
        'development' => "mysql://{$config['user']}:{$config['password']}@{$config['host']}/{$config['dbname']}"
      )
    );
  });

  // our action handler moved into our config file as a function
  /*
  * action_handler ( array $actions, string $error_redirect )
  * $available_actions is a list of function names defined in executing script
  */
  function action_handler ( $available_actions, $request ) {
    if ( isset( $request['action'] ) && in_array( $request['action'], $available_actions ) ) {
      return call_user_func( $request['action'], $request );
    }
  }

  // pass the params as an array so they can be dynamically built
  function get_included_file_contents ( $path, $params = [] ) {
    // PHP allows for dynamic variables to be created where the label is decided at runtime
    if ( !empty( $params ) ) {
      foreach ( $params as $label => $value ) { $$label = $value; }
    }

    // start the buffer (PHP will only parse included files. Included files will immediately output, so to prevent this, we have to buffer the current output. ob_start() will begin the buffer process. ob_get_contents() will return the current buffer. ob_end_clean() flushes the content out of the buffer.)
    ob_start();
    include $path;
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
  }

  // an authentication function to check if the request is permitted
  function request_is_authenticated ( $request, $whitelist ) {
    if ( !isset( $_SESSION['authenticated'] ) ) {
      if ( !in_array( $request['action'], $whitelist ) ) {
        $_SESSION['fail'] = 'You are not authorized.';
        header( 'Location: ../movies/?action=index' );
        exit;
      }
    }

    return true;
  }

  // an authentication function to check if the user is authenticated
  function is_authenticated () {
    return isset( $_SESSION['authenticated'] ) && !empty( $_SESSION['email'] );
  }









