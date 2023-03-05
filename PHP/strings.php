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
    // len()
    echo strlen("123456789") . "<br>";

    // word count
    echo str_word_count("123456789 123456789") . "<br>"; // 0 because all we have numbers
    echo str_word_count("word1 word2") . "<br>"; // 2

    // rev string
    echo strrev("123456789") . "<br>";

    // find() in Python
    echo strpos("123456789", "9") . "<br>";

    // replace
    echo str_replace("word", "changed", "word word word") . "<br>"; // recursive

    
    ?>
</body>
</html>