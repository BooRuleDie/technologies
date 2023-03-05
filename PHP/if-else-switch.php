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
    $t = date("H"); // get the current hours
    
    if ($t < 23) {
        echo $t . "<br>";
    }

    # The else if keyword is kind of weird

    if (1 === 2) {
        
    } elseif (1 === 1) {
        echo "Hey!" . "<br>";
    }

    $switch_value = "black";

    switch($switch_value) {
        case "red":
            echo "The color you picked is red";break;
        case "green":
            echo "The color you picked is green";break;
        case "blue":
            echo "The color you picked is blue";break;
        default:
            echo "The color you picked is neither red, green nor blue.";
    }
    ?>
</body>
</html>