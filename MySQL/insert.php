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
        
        // create guests table 
        $sql = "INSERT INTO Guests(firstname, lastname, email) VALUES('Eren', 'BooRuleDie', 'hulolo@gmail.com')";
        $conn -> query($sql);
        
        // informing user about what happened
        echo "A row was inserted.";
        
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e -> getMessage();
    }
    
    // closing connection
    $conn = null;
?>