<?php 
    // There are three access modifiers and you can apply them to both properties and methods

    # 1. public: method or property can be accessed from everywhere.
    # 2. protected: method or propery can be accessed from only class or inherited classes.
    # 3. private: method or property can be accessed from only class.

    class Fruit {
        public $name1;
        protected $name2;
        private $name3;

        public function __construct($name1, $name2, $name3) {
            $this -> name1 = $name1;
            $this -> name2 = $name2;
            $this -> name3 = $name3;
        }

        public function getAllNames(){
            return array($this -> name1, $this -> name2, $this -> name3);
        }
    }

    $apple = new Fruit("value of name1", "value of name2", "value of name3");
    print_r($apple -> getAllNames()); // No error
    echo "<br>" . $apple -> name1 . "<br>"; // No error
    echo $apple -> name2 . "<br>"; // ERROR
    echo $apple -> name3 . "<br>"; // ERROR

    // As I just mentioned above, you can set private or protected access modifiers for methods as well
?>