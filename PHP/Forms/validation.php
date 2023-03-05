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
        // Other than htmlspecialchars(), trim(), stripslashes() we define custom validation rules using functions and regex

        if (!empty($_GET["email"])) {
            $regex_rule = "/^[\d\w\-\.]+@[\d\w\-\.]+\.\w+$/"; // don't forget to escape - character
            $userEmail = $_GET["email"];
            if (!preg_match($regex_rule, $userEmail)){
                echo "<h1>Invalid email</h1><hr>";
            }
        }

        // Note: Assume that there are multiple input fields in a form and you need to perform
        // validation for each of them. In that case keeping valid inputs in the input fiels might be a good practice.
        
    ?>

</body>
</html>