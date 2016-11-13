<?php

  // start our session to avoid headers issue
  session_start();

  /* ACTION HANDLER */
  // attach PHP ActiveRecord
  require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/MovieArena/config.php';

  /* VIEWS */
  // create
  function create () {
    $movies = Movie::all();
    return get_included_file_contents( 'views/create.php', ['movies' => $movies] );
  }


  // edit
  function edit ( $get ) {
    if ( !isset( $get['id'] ) || !Actor::exists( $get['id'] ) ) {
      $_SESSION['fail'] = 'You must choose an actor to edit.';
      header( 'Location: ../movies/index.php?action=index' );
      exit;
    }

    $actor = Actor::find( $get['id'] );
    $movies = Movie::all();
    return get_included_file_contents( 'views/edit.php', ['movies' => $movies, 'actor' => $actor] );
  }


  /* PROCESSES */
  // add
  function add ( $post ) {
    // create the new actor
    $actor = New Actor;

    // assign the values
    $actor->name = $post['name'];
    $actor->role = $post['role'];
    $actor->movie_id = $post['movie_id'];

    // process the image
    $actor->file = $_FILES['image'];

    // save the image
    $actor->save();

    // redirect with an error if the actor is invalid
    if ( $actor->is_invalid() ) {
      $_SESSION['fail'][] = $actor->errors->full_messages();
      $_SESSION['fail'][] = 'The actor could not be added.';

      header( 'Location: index.php?action=create' );
      exit;
    }

    // redirect with a success if actor was saved
    $_SESSION['success'] = 'Actor was added successfully.';
    header( 'Location: ../movies/index.php?action=show&id=' . $actor->movie->id );
    exit;
  }


  // update
  function update ( $post ) {
    // redirect if the id wasn't passed or the actor does not exist
    if ( !isset( $post['id'] ) || !Actor::exists( $post['id'] ) ) {
      $_SESSION['fail'] = 'You must choose an actor to edit.';
      header( 'Location: ../movies/index.php?action=index' );
      exit;
    }

    // find the actor
    $actor = Actor::find( $post['id'] );

    // assign the values to actor
    $actor->name = $post['name'];
    $actor->role = $post['role'];
    $actor->movie_id = $post['movie_id'];

    // process the image
    if ( !empty( $post['current_image'] ) ) $actor->image = $post['current_image'];
    $actor->file = $_FILES['image'];

    // save the actor
    $actor->save();

    // if there are validation errors, redirect with an error message
    if ( $actor->is_invalid() ) {
      $_SESSION['fail'][] = $actor->error->full_messages();
      $_SESSION['fail'][] = 'The actor could not be updated.';

      header( 'Location: index.php?action=edit&id=' . $actor->id );
      exit;
    }

    // redirect with a success message
    $_SESSION['success'] = 'Actor was updated successfully.';
    header( 'Location: ../movies/index.php?action=show&id=' . $actor->movie->id );
    exit;
  }


  // delete
  function delete ( $post ) {
    if ( !isset( $post['id'] ) || !Actor::exists( $post['id'] ) ) {
      $_SESSION['fail'] = 'You must choose an actor to edit.';
      header( 'Location: ../movies/index.php?action=index' );
      exit;
    }

    $actor = Actor::find( $post['id'] );
    $movie = $actor->movie;
    $actor->delete();

    $_SESSION['success'] = 'The actor was removed successfully.';
    header( 'Location: ../movies/index.php?action=show&id=' . $movie->id );
  }


  /* Authentication Block */
  request_is_authenticated( $_REQUEST, [] );

  // action handler for REQUEST
  $yield = action_handler( ['add', 'update', 'delete', 'create', 'edit'], $_REQUEST );