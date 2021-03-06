<?php

  // require the ActiveRecord library
  require_once $_SERVER['DOCUMENT_ROOT'] . '/lesson-09/examples/config.php';

  // start the session
  session_start();

  // redirect the user if they've come to this page accidentally
  if ( $_SERVER['REQUEST_METHOD'] != 'POST' || !isset( $_POST['action'] ) ) {
    header( 'Location: index.php' );
    exit;
  }

  // set messages and perform database operations
  switch ( $_POST['action'] ) {
    case 'new':
      // set the success message
      $success = "Category was created successfully.";

      // store error messages in an array
      $fail = "Category couldn't be created.";

      // create new record
      $category = new Category;

      // assign the values
      $category->name = $_POST['name'];

      // when we save, we apply our assigned properties and write them to the DB
      $category->save();
      break;
    case 'edit':
      // set the success message
      $success = "Category was updated successfully.";

      // store error messages in an array
      $fail = "Category couldn't be updated.";

      // get existing record
      $category = Category::find( $_POST['id'] );

      // assign the values
      $category->name = $_POST['name'];

      // save the updated fields
      $category->save();
      break;
    case 'delete':
      // set the success message
      $success = "Category was deleted successfully.";

      // store error messages in an array
      $fail = "Category couldn't be deleted.";

      // get existing record
      $category = Category::find( $_POST['id'] );

      // delete the user
      $category->delete();
      break;
  }

  // handle any errors
  if ( $category->is_valid() === false ) {
    // set the fail messages
    $_SESSION['fail'][] = $fail;
    $_SESSION['fail'][] = $category->errors->full_messages();

    // if action is new or edit, assign the post to session 'post'
    if ( in_array( $_POST['action'], ['new', 'edit'] ) ) $_SESSION['post'] = $_POST;

    // set redirects
    if ( $_POST['action'] == 'new' ) header( 'Location: new.php' );
    if ( $_POST['action'] == 'edit' ) header( 'Location: edit.php?id=' . $_POST['id'] );
    if ( $_POST['action'] == 'new' ) header( 'Location: index.php' );
    exit;
  }

  // redirect with the success message
  $_SESSION['success'] = $success;
  header( 'Location: index.php' );
  exit;