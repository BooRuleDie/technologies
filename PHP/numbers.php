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
        echo PHP_INT_MAX . "<br>";
        echo PHP_INT_MIN . "<br>";
        echo PHP_INT_SIZE . "<br>";

        // you can check if the data type is integer
        echo is_int(13) . "<br>";
        echo is_integer(13.1) . "<br>"; // alias of is_int
        echo is_long(13) . "<br>"; // alias of is_int

        // I'm not going to write the same methods for the float numbers
        // Just know that same things can be applied for float numbers as well

        // A value that is larger than the PHP_INT_MAX is considered as the Infinity

        $x = 1e1000;
        var_dump($x); // float(INF)
        // is_finite(), is_infinite() are available methods
        echo "<br>";

        // NaN stands for Not a Number and it's used for the impossible mathematical operations
        echo is_nan(acos(8)) . "<br>";

        echo is_numeric(1 + 1.1) . "<br>";

        // Type casting
        $string_float = "13.1";
        $integer = (int)$string_float;
        var_dump($integer) // prints int(13)

    ?>
</body>
</html>