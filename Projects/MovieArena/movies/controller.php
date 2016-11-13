<?php

  // start our session to avoid headers issue
  session_start();

  /* ACTION HANDLER */
  // attach PHP ActiveRecord
  require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/MovieArena/config.php';

  /* VIEWS */
  // index
  function index () {
    $movies = Movie::all();
    return get_included_file_contents( 'views/index.php', ['movies' => $movies] );
  }


  // show
  function show ( $get ) {
    // redirect user if here accidentally
    if ( !isset( $get['id'] ) || !Movie::exists( $get['id'] ) ) {
      $_SESSION['fail'] = "You must select a movie.";
      header( 'Location: index.php?action=index' );
      exit;
    }

    $movie = Movie::find( $get['id'] );
    return get_included_file_contents( 'views/show.php', ['movie' => $movie] );
  }


  // create
  function create () {
    return get_included_file_contents( 'views/create.php' );
  }


  // edit
  function edit ( $get ) {
   if ( !isset( $get['id'] ) || !Movie::exists( $get['id'] ) ) {
      $_SESSION['fail'] = "You must select a movie.";
      header( 'Location: index.php?action=index' );
      exit;
    }

    $movie = Movie::find( 'first', $get['id'] );
    return get_included_file_contents( 'views/edit.php', ['movie' => $movie] );
  }


  /* PROCESSES */
  // add
  function add ( $post ) {
    // create a new record
    $movie = new Movie;

    // assign the values
    $movie->name = $post['name'];
    $movie->release_year = $post['release_year'];

    // when we save, we apply our assigned properties and write them to the database
    $movie->save();

    // redirect if there is an error
    if ( $movie->is_invalid() ) {
      // set the fail messages
      $_SESSION['fail'][] = $movie->errors->full_messages();
      $_SESSION['fail'][] = 'The movie could not be added.';

      // redirect
      header( 'Location: index.php?action=create' );
      exit;
    }

    // set the success message
    $_SESSION['success'] = 'Movie was added successfully.';
    header( 'Location: index.php?action=index' );
    exit;
  }


  // update
  function update ( $post ) {
    // redirect user if here accidentally
    if ( !isset( $post['id'] ) || !Movie::exists( $post['id'] ) ) {
      $_SESSION['fail'] = "You must select a movie.";
      header( 'Location: index.php?action=index' );
      exit;
    }

    // get existing record
    $movie = Movie::find( $post['id'] );

    // assign the values
    $movie->name = $post['name'];
    $movie->release_year = $post['release_year'];

    // when we save, we apply our assigned properties and write them to the database
    $movie->save();

    // redirect if there is an error
    if ( $movie->is_invalid() ) {
      // set the fail messages
      $_SESSION['fail'][] = $movie->errors->full_messages();
      $_SESSION['fail'][] = 'The movie could not be updated.';

      // redirect
      header( 'Location: index.php?action=edit&id=' . $movie->id );
      exit;
    }

    // set the success message
    $_SESSION['success'] = 'Movie was updated successfully.';
    header( 'Location: index.php?action=index' );
    exit;
  }


  // delete
  function delete ( $post ) {
    // redirect user if here accidentally
    if ( !isset( $post['id'] ) || !Movie::exists( $post['id'] ) ) {
      $_SESSION['fail'] = "You must select a movie.";
      header( 'Location: index.php?action=index' );
      exit;
    }

    // delete the record
    $movie = Movie::find( $post['id'] );
    $movie->delete();

    $_SESSION['success'] = 'The movie was deleted successfully.';
    header( 'Location: index.php?action=index' );
    exit;
  }


  /* Authentication Block */
  request_is_authenticated( $_REQUEST, ['index', 'show'] );

  // action handler for REQUEST
  $yield = action_handler( ['add', 'update', 'delete', 'index', 'show', 'create', 'edit'], $_REQUEST );