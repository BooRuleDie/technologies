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

    // I'm not going to mention all operators since they are almost same with the other programming languages, I'll just mention the specific ones
    
    echo 3 ** 3 . "<br>";

    // The comparison is similar to javascript

    echo 1 == "1"; // 1
    echo "<br>"; 
    echo 0 == "1";  // returns nothing
    echo "<br>"; 
    echo 1 === "1"; // returns nothing because it's false
    echo "<br>";
    echo 1 === 1;
    echo "<br>";
    // You can also use the <> as the alias of !=
    // If you need to compare two values strictylt use !==

    // The following one is a little interesting
    $x = 1;
    $y = 2;
    

    echo $x <=> $y;echo "<br>"; // returns -1 becasue x < y
    echo $y <=> $x;echo "<br>"; // returns 1 because y > x
    echo --$y <=> $x;echo "<br>"; // returns 0 because --y == x, it doesn't compare strictly !!!

    echo 1 xor 0; echo "<br>"; // returns 1

    // String concat assingment 
    $text = "Text";
    $addMeToText = " added";

    $text .= $addMeToText;
    echo $text . "<br>";

    // Ternary
    $ternary = (1 === 1) ? "It's one" : "No, it isn't.";
    echo $ternary . "<br>";

    ?>
</body>
</html>