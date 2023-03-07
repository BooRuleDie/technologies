<?php 
    // Inheritance in OOP -> when a class is derived from another class, it's called inheritance
    // The child class inherits all public and protected methods and properties of the parent class.

    class Fruit {
        protected $name;
        protected $color;

        // constructor must be public otherwise you can't create an object of the class from outside of the class
        public function __construct($name, $color){
            $this -> name = $name;
            $this -> color = $color;
        }

        // getter setter methods
        public function getName() {
            return $this -> name;
        }

        public function getColor() {
            return $this -> color;
        }

        public function setName($name) {
            $this -> name = $name;
        }

        public function setColor($color) {
            $this -> color = $color;
        }

        public function intro() {
            echo "I'm a Fruit<br>";
        }
    }

    class Berries extends Fruit { // Berry is the child class, Fruits is the parent class
        public function iAmABerry() {
            echo "I'm a berry<br>";
        }

        // You can also override the functions that has inheried from the parent classes
        public function intro() {
            echo "I used to be saying that I'm fruit but now I'm saying that I'm a Berry.<br>";
        }
    }

    $berry1 = new Berries("Fav Berry", "Red");
    $berry1 -> intro();
    echo "First Name: " . $berry1 -> getName() . "<br>";
    $berry1 -> iAmABerry();
    $berry1 -> setName("Second Fav Berry");
    echo "New Name: " . $berry1 -> getName();

    // If you don't want a class to be inherited or a function to be overriden for a specific class. You can use the final keyword.

    // final class Fruit {
    //     // code here
    // }

    // class Berries extends Fruit { //  -> ERROR
    //     // code here
    // }

?>