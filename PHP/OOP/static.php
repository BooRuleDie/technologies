<?php 
    // static methods and static properties can be called without creating an instance of the class

    class Car {
        public static $name = "Heisenberg"; // default name 

        // constructor
        public function __construct($name) {
            $this -> name = $name;
        }

        public static function sayMyName() {
            echo "You are Heisenberg.<br>";
        }
    }

    echo Car::$name . "<br>";
    Car::sayMyName();

    // As you can see both the method and the property are called without creating an object of the Car class.

    // If you want to call the static property or method within the class, you can use following syntax: 
    // self::<method or property name>

    // If the static method or property is protected. You can use the parent keyword to call the static method or property from the inherited child class.
    // parent::<method or property name>
?>