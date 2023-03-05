<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>

<body>
    <?php
    # scopes are little bit different than the python
    # There are three type of scopes
    // 1. global
    // 2. local
    // 3. static

    // If a variable is declared in the global scope a function can't access that variable directly

    $global_variable = "I'm global variable";
    function test()
    {
        echo "What are you? " . $global_variable . "<br>";
    }
    test(); // returns an error since it's not defined in the local scope

    function test2()
    {
        $global_variable = "I'm local variable";
        echo "What are you? " . $global_variable . "<br>";
    }
    test2(); // returns What are you? I'm local variable

    // If you'd like to access an global variable within the functions there are severals ways:

    // 1. you can use global keyword
    function test3()
    {
        global $global_variable; // now you're good to use the global_variable in the local scope
        echo "What are you? " . $global_variable . "<br>";
    }
    test3(); // returns What are you? I'm global variable

    // 2. you can use the GLOBALS array which is an array that stores all global variables
    function test4()
    {
        echo "What are you? " . $GLOBALS["global_variable"] . "<br>";
    }
    test4(); // returns What are you? I'm global variable

    // And lastly there is the static scope
    // Normally when a function is called, all the variables are deleted after the function is executed
    // You can prevent it to happen by using static keyword

    function test5()
    {
        static $increase = 0; // the variable is still local though
        $increase++;
        echo $increase . "<br>";
    }

    test5(); // 1
    test5(); // 2
    test5(); // 3

    ?>


</body>

</html>