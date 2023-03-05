<?php declare(strict_types=1);
    // The documentation says PHP has more than 1000 builtin functions

    // PHP is a Loosely Typed Language however with the PHP 7, now we can define type declarations like that:

    //Normal function
    function test($random_var = 10 /*default value*/) {
        echo "$random_var<br>";
    }

    test();
    test("I changed the type");
    
    // Type declaration functions
    function test2(int $integer_value) {
        echo "You entered $integer_value<br>";
    }
    
    test2(1);
    // test2("POWA of type declaration."); // it didn't raise an error becuase we need to specify the
                                       // declare(strict_types=1); at the very beginning of the php tag

    // you can also declare the type of the what function returns
    function test3(int $test_var = 10) : int {
        return $test_var * 10;
    }
    test3(11);

    // Passing an variable to a function using references
    // The change made in the function will be made for the passed variable as well.
    // In this case function doesn't use a copy of the passed value, it uses the actual value
    $global_var = 10;
    function referenceTest(&$ref_var) {
        $ref_var--;
        echo "Decreased the passed value by using reference.<br>";
    }
    referenceTest($global_var);
    echo $global_var . "<br>";
?>
