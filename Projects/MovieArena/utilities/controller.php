<?php

  // start our session to avoid headers issue
  session_start();

  /* ACTION HANDLER */
  // attach PHP ActiveRecord
  require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/MovieArena/config.php';

  /* VIEWS */
  // index
  function actor_seeder () {
    return get_included_file_contents( 'views/actor_seeder.php' );
  }


  /* PROCESSES */
  function actor_seeder_process () {
    // verify there is a file and it's a CSV
    if ( $_FILES['csv']['error'] !== 0 || !preg_match( "/csv/i", $_FILES['csv']['type'] ) ) {
      $_SESSION['fail'][] = "You must upload a valid CSV (comma-separated values) file.";
      header( 'Location: index.php?action=product_seeder' );
      exit;
    }

    // convert the file into an associative array
    $csv = build_csv_array( file( $_FILES['csv']['tmp_name'] ) );

    /* populate the database */
    foreach ( $csv as $row ) {
      // check if the movie exists
      if ( Movie::exists( ['name' => $row['movie']] ) ) {
        $movie_id = Movie::find( 'first', ['name' => $row['movie']] )->id;
      } else {
        $movie_id = Movie::create( ['name' => $row['movie']] )->id;
      }

      // check if the actor exists
      if ( !Actor::exists( ['name' => $row['actor'], 'movie_id' => $movie_id] ) ) {
        Actor::create( ['name' => $row['actor'], 'movie_id' => $movie_id, 'role' => $row['role']] );
      }
    }

    header( 'Location: ../movies/index.php?action=index' );
    exit;
  }

  function build_csv_array ( $csv ) {
    // get the rows
    $rows = array_map( 'str_getcsv', $csv );

    // get the header row
    $header = array_shift( $rows );

    // build the CSV associative array
    $csv = [];
    foreach ( $rows as $row ) {
      $csv[] = array_combine( $header, $row );
    }

    return $csv;
  }


  /* Authentication Block */
  request_is_authenticated( $_REQUEST, [] );

  // action handler for REQUEST
  $yield = action_handler( ['actor_seeder', 'actor_seeder_process'], $_REQUEST );