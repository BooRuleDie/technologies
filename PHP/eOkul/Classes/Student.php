<?php
    // Include User class to inherit from
    include 'User.php';

    class Student extends User {

        public function __construct($name, $password) {
            // Call parent constructor to set common properties
            parent::__construct($name, $password);

            // Set student specific properties
            $this->role = 'Student';
        }

    }
