<?php 
    // Abstract Class are classes that have methods which don't have bodies and should be implemented by the inherited child classes.
    // There are a few rules for the abstract classes:
        # 1. Abstract classes must have at least one ABSTRACT method (method that doesn't have a body.)
        # 2. The child class should implement the body of the inherited abstract method
        # 3. The name of the abstract method within the child class and parent class must be same.
        # 4. The access modifier in the child class can be same or less restricted according to the access modifier of the absract method within the parent class
            # Parent Abstact Method: protected
            # Child Abstract Method: can be protected or public, can't be private
        # 5. Number of required arguments must be same however child class can add additional arguments.

        // Parent Class
        abstract class Car {
            protected $model;

            public function __construct($model){
                $this -> model = $model;
            }

            protected abstract function intro($name); // doesn't have a body
        }

        // Child Class
        class CarModel extends Car {
            public function intro($name) {
                echo "Hi I'm {$name}<br>";
                echo "Model of this car is {$this -> model}<br>";
            }
        }

        // Creating object and calling abstract class
        $obj = new CarModel("Suzuki Esteem");
        $obj -> intro("Saul Goodman");
?>