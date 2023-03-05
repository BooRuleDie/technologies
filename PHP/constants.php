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
    // Constant names don't start with $ sign unlike variables
    // This is how you can create constants:
    define("NAME_OF_CONSTANT", "I'm the value of the first constant", false); // the last value refer to value of case_insensitivity, you don't have to set a value for it. By default it's false.

    echo NAME_OF_CONSTANT . "<br>";

    // constant that holds an array as the value
    define("CONS1", [1,2,3,4,5]);
    echo CONS1[4] . "<br>";

    // Unlike variables constants are globals, you can access them inside and outside of the functions
    
    ?>
</body>
</html>