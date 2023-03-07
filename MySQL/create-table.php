<?php 
    $hostname = "localhost";
    $username = "root";
    $password = "mysql";
    $dbname = "createdDB";

    try {
        // create connection, notice that dbname added to the first argument
        $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

        // set the PDO error mode to exception
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // create guests table 
        $sql = "CREATE TABLE Guests (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(30),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $conn -> exec($sql);

        echo "Guests Table has been created!<br>";
        
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e -> getMessage();
    }
    
    // closing connection
    $conn = null;
?>