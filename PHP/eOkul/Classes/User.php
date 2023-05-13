<?php 
    class User {
        protected $id;
        protected $name;
        protected $role;
        protected $password;
    
        public function __construct($name, $password) {
            $this->id = uniqid("eokul_", true);
            $this->name = $name;
            $this->password = password_hash($password, PASSWORD_DEFAULT);
        }
    
        // getters and setters for all properties
        public function getId() {
            return $this->id;
        }
    
        public function setId($id) {
            $this->id = uniqid("eokul_", true);
        }
    
        public function getName() {
            return $this->name;
        }
    
        public function setName($name) {
            $this->name = $name;
        }

        public function getRole() {
            return $this->role;
        }
    
        public function setRole($role) {
            $this->role = $role;
        }
    
        public function getPassword() {
            return $this->password;
        }
    
        public function setPassword($password) {
            $this->password = password_hash($password, PASSWORD_DEFAULT);
        }

        public function verifyPassword($password) {
            return password_verify($password, $this->password);
        }
    
        // generic method to print user info
        public function getInfo() {
            return "ID: " . $this->id . "<br>" .
                "Name: " . $this->name . "<br>" .
                "Role: " . $this->role . "<br>";
        }
    }
