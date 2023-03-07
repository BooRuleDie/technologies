<?php 
    $hostname = "localhost";
    $username = "root";
    $password = "mysql";
    $dbname = "createdDB";

    try {
        // create connection
        $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

        // set the PDO error mode to exception
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // define delete SQL
        $sql = "DELETE FROM Guests WHERE firstname LIKE 'W%';";

        // execute the SQL
        $conn -> exec($sql);
        echo "The record has been removed.<br>";

        
    } catch(PDOException $e) {
        echo "<br>" . $e -> getMessage();
    }
    
    // closing connection
    $conn = null;
?>