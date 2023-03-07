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
        $sql = "UPDATE Guests SET firstname = 'Gustavo' WHERE id = 2;";

        // prepare statement
        $preparedStatement =  $conn -> prepare($sql);

        // execute statement
        $preparedStatement -> execute();

        echo "{$preparedStatement -> rowCount()} records updated!<br>";
        
    } catch(PDOException $e) {
        echo "<br>" . $e -> getMessage();
    }
    
    // closing connection
    $conn = null;
?>