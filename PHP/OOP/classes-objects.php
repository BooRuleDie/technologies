<?php 
    // Why should we sue OOP ?
    // 1. It's faster and easier to execute
    // 2. OOP provides a clear structure for programmers
    // 3. OOP helps about DRY principle

    class Fruit {
        // properties
        public $name;
        public $color;

        // constructor, is called automatically upon creation of object
        function __construct($name, $color) {
            $this -> name = $name;
            $this -> color = $color;
        }

        // destructor, it's called automatically when the script is stopped or exited.
        function __destruct() {
            echo "The fruit is {$this -> name} and the color is {$this -> color}<br>";
        }

        // methods, an example of getter and setter methods
        function getName() {
            return $this -> name; // $this -> name is equivalent of this.name in JS
        }

        function setName($name) {
            $this -> name = $name;
        }
        
        function getColor() {
            return $this -> color;
        }

        function setColor($color) {
            $this -> name = $color;
        }
    }

    $apple = new Fruit("apple", "red");
    // you can check if an object belongs to a specific class using instanceof keyword.
    var_dump($apple instanceof Fruit); // bool(true)
    $nameOfTheObject = $apple -> getName();
    echo $nameOfTheObject . "<br>";
?>  
