<?php 
    // PHP doesn't allow to extend more than one class, so if a class needs to inherit multiple behaviours traits can be used.
    // Note that one class in PHP can implement a interface, extend a class and use a trait at the same time.

    trait Hello {
        public function hello() {
            echo "Hi everyone!<br>";
        }
    }

    trait ByeBye {
        public function byebye() {
            echo "See you later!<br>";
        }
    }

    class Test {
        use Hello, ByeBye;
    }

    $obj = new Test();
    $obj -> hello();
    $obj -> byebye();
?>