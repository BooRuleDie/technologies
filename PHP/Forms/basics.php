<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>

    <form action="./basics.php" method="post">
    Name: <input type="text" name="name"><br>
    E-mail: <input type="text" name="email"><br>
    <input type="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" and !empty($_POST["name"]) and !empty($_POST["email"]) ) {
        echo "Welcome " . $_POST["name"] . "<br>";
        echo "Your email is " . $_POST["email"];    
    } 
    ?>
</body>
</html>