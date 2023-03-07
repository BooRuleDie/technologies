<?php 
    // Constans can be used for values that should not be changed.
    // If you want to access a constant from a class you can use the following syntax: self::<constant name>
    // Or you want to access a constant from the outside of the class you can use <class name>::<consant name>

    class TestForConstants {
        // you can set access modifiers to constants as well: private, protected, public
        const TEST_CONSTANT = "This is the value of the test constant";

        public function echoTestConstant() {
            echo self::TEST_CONSTANT . "<br>";
        }
    }

    echo TestForConstants::TEST_CONSTANT . "<br>";
    $tempClass = new TestForConstants();
    $tempClass -> echoTestConstant();
?>