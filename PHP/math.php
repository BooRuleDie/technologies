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
    echo pi() . "<br>";
    echo min(array(1,2,3,4,5,6,7,8,9)) . "<br>";
    echo max(array(1,2,3,4,5,6,7,8,9)) . "<br>";
    echo abs(-1.1) . "<br>";
    echo sqrt(9) . "<br>";

    // round is used to round a float number to nearest integer
    echo round(6.49) . "<br>"; // 6
    echo round(6.5) . "<br>"; // 7
    echo round(6.6) . "<br>"; // 7

    echo rand() . "<br>"; // random integer, you can also define a range for the numbers that will be created
    echo rand(1,10) . "<br>"; // 1 and 10 are inclusive
    ?>
</body>
</html>