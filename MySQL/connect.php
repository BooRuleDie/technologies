<?php 
    $hostname = "localhost";
    $username = "mysql";
    $password = "mysql";

    // connect to the database
    $conn = new mysqli($hostname, $username, $password);

    // check if there is any error with the connection
    if ($conn -> connect_error) {
        die("Connection Failed: " . $conn -> connect_error . "<br>");
    }else {
        echo "Connection is successful!<br>";
    }

    // closing connection
    $conn -> close();
?>