<?php

  class Actor extends ActiveRecord\Model {

    public $file = [];

    // callbacks
    static $before_save = array( 'upload' );

    // associations/relationships
    static $belongs_to = array( 'movie' );

    /* Sanitizations */
    // setter
    public function set_name ( $name ) {
      $this->assign_attribute( 'name', filter_var( $name, FILTER_SANITIZE_STRING ) );
    }

    public function set_role ( $role ) {
          $this->assign_attribute( 'name', filter_var( $role, FILTER_SANITIZE_STRING ) );
    }

    // getter
    public function get_name () {
      return htmlentities( $this->read_attribute( 'name' ) );
    }

    public function get_role () {
          return htmlentities( $this->read_attribute( 'role' ) );
    }

    /* Validations */
    static $validates_presence_of = array(
      array( 'name', 'message' => 'must be present.' ),
      array( 'role', 'message' => 'must be present.' )
    );

    static $validates_size_of = array(
      array( 'name', 'maximum' => 100, 'too_long' => 'is way too long.' ),
      array( 'role', 'maximum' => 100, 'too_long' => 'is way too long.' )
    );

    static $validates_uniqueness_of = array(
      array( array( 'name', 'role', 'movie_id' ), 'message' => 'exists for this movie already.' )
    );

    public function validate () {
      // validate the presence of the movie in the database
      if ( Movie::exists( $this->movie_id ) === false ) {
        $this->errors->add( 'movie_id', "doesn't exist." );
      }

      // validate an image is being uploaded
      if ( !empty( $this->file['name'] ) && !empty( $this->image ) ) {
        // validate type
        if ( !preg_match( "/png|gif|jpg|jpeg/i", $this->file['type'] ) ) {
          $this->errors->add( 'image', "is an invalid file." );
        }

        // validate size
        if ( $this->file['size'] > 30000 ) {
          $this->errors->add( 'image', "is too large. Please only upload images 30KB or less." );
        }

        // validate other errors
        if ( $this->file['error'] !== 0 ) {
          $this->errors->add( 'image', "has an error." );
        }
      }
    }

    // callback functions
    public function upload () {
      if ( $this->is_valid() && !empty( $this->file['name'] ) ) {
        // upload the image
        $uploadfile = '../uploads/images/' . $this->file['name'];

        if ( move_uploaded_file( $this->file['tmp_name'], $uploadfile ) ) {
          // assign the name
          $this->image = $this->file['name'];
        } else {
          // throw error
          $this->errors->add( 'image', "could not be uploaded." );
        }
      }
    }

  }