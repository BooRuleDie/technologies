<?php 

session_start(); 
// yes even if you want to remove the session variables and destroy the session you need to start the session at the very beginning of the file and before the html tags
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
        session_unset(); // removes all session variables;
        session_destroy(); // destroys session;

        echo "All session variables were removed and session was destroyed.";
    ?>
</body>
</html>