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
        // include or require keywords are used to import contens of another file into the current php script where the include keyword is used. They are almost identical except following differences:
        // Include: raises E_WARNING and script continues to execute
        // Require: raises E_COMPILE_ERROR and stops the PHP script
    ?>

    <h1>Welcome to my awesome web page.</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, hic?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, hic?</p>

    <?php include "footer.php" ?>
    <?php require "footer.php" ?>

</body>
</html>