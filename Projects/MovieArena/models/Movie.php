<?php

class Movie extends ActiveRecord\Model
{

    // associations/relationships
    static $has_many = array('actors');

    /* Sanitizations */
    // setter
    public function set_name($name)
    {
        $this->assign_attribute('name', filter_var($name, FILTER_SANITIZE_STRING));
    }

    public function set_release_year($release_year)
    {
        $this->assign_attribute('release_year', filter_var($release_year, FILTER_SANITIZE_NUMBER_INT));
    }

    // getter
    public function get_name()
    {
        return htmlentities($this->read_attribute('name'));
    }

    public function get_release_year()
    {
        return $this->read_attribute('release_year');
    }


    /* Validations */
    static $validates_presence_of = array(
        array('name', 'message' => 'must be present.'),
        array('release_year', 'message' => 'must be present.')
    );

    static $validates_size_of = array(
        array('name', 'maximum' => 100, 'too_long' => 'is way too long.')
    );


    static $validates_numeralicity_of = array(
        array('release_year', 'lesser_than' => 2016, 'message' => 'must be less than 2016')
    );


    static $validates_uniqueness_of = array(
        array('name', 'message' => 'already exists.'),
        array('release_year', 'message' => 'already exists.')
    );

}