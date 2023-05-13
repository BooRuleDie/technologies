<?php
    // Include User class to inherit from
    include 'User.php';

    class Teacher extends User {

        public function __construct($name, $password) {
            // Call parent constructor to set common properties
            parent::__construct($name, $password);

            // Set teacher specific properties
            $this->role = 'Teacher';
        }

    }
