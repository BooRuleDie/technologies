<?php 
    // you can throw an error message using 'throw' keyword, when an error is thrown rest of the code won't be executed.

    function cantBe99($number) {
        if ($number === 99) {
            throw new Exception("Number can't be 99 >:(.");
        }else {
            return "Thanks for not entering 99 :).";
        }
    }
    // echo cantBe99("test") . "<br>";
    // echo cantBe99(101) . "<br>";
    // echo cantBe99(99) . "<br>"; // Fatal error: Uncaught Exception: Number can't be 99 >:(.
    // echo cantBe99("test") . "<br>"; // was not executed
    // echo cantBe99(101) . "<br>"; // was not executed

    // to avoid the code from terminating itself we can use try, catch statements
    $array = array("test", 101, 99, "test", 101);
    try {
        foreach($array as $value){
            echo $value . " ";
            echo cantBe99($value) . "<br>";
        }
    } catch(Exception $e) {
        echo "An error occured: $e<br>";
    } finally {
        echo "I'm going to run anyway.<br>";
    }

    echo "<br> But I'm still alive.<br>";
    
    // Since exceptions are PHP objects, they have some useful methods like:
    // getMessage() -> returns error message
    // getCode() -> returns error code 
    // etc. if you need it you can learn more about it from w3schools or official documentation of PHP
 ?>
