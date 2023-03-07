<?php 

// PHP Sessions and cookies are used to solve the same problem, identifying users. Since HTTP protocol is statless it doesn't remember who you are after you make the next request. So we use cookies or sessions so to solve this problem however there are still small differences between them.

// 1. PHP Sessions are stored on the filesystem of server-side whereas cookies are stored in the browser of the client-side
// 2. You can define how long a cookie last but you can't do it for sessions. When the user close the browser PHP session is removed automatically.

// We should call the session_start() function before the html tags as in cookies.

session_start();

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
    
    $_SESSION["favcolor"] = "green";
    $_SESSION["favanimal"] = "rabbit";

    echo "Session variables are set.<br>";
    ?>
</body>
</html>
