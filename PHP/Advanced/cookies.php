<?php 
    // setcookie() function must be before the HTML Tag !!!
    // time() -> current time's epoch value
    if (!empty($_SERVER["HTTPS"])) {
        setcookie("nameOfCookie", "valueOfTheCookie", time() + 60, "/", "", true, true);
    }
    
    // secure flag is enabled -> HTTPS only
    // httponly flag is enabled -> JS can't access value of the cookie
    // this particular cookie lasts only 1 minute 
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
    <p>
        <?php 
            // if there is a cookie and the request is made through HTTPS
            if (isset($_COOKIE["nameOfCookie"]) && !empty($_SERVER["HTTPS"])) {
                echo "Here is the value of the cookie: " . $_COOKIE["nameOfCookie"] . "<br><br>";
            } else {
                echo "No cookie is set :(<br>";
            }
        ?>
    </p>
    
</body>
</html>