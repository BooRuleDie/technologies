<?php 

session_start(); // Even when you need to retrieve the values of session variables you need to start the sesion!

?>

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
    
    if (isset($_SESSION["favcolor"]) && isset($_SESSION["favanimal"])) {

        echo "Thanks to PHP session I am able retrieve your favourite color and animal which are " . $_SESSION["favcolor"] . " and " . $_SESSION["favanimal"] . "<br><br>";
    }
    
    echo "All session variables: <br>";
    foreach ($_SESSION as $key => $value) {
        echo "$key: $value<br>";
    }
    
    ?>
</body>
</html>