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
        
        // multiple SQL queries
        $sql1 = "INSERT INTO Guests(firstname, lastname, email) VALUES('Micheal', 'Ehrmantraut', 'mike@gmail.com')";
        $sql2 = "INSERT INTO Guests(firstname, lastname, email) VALUES('Gus', 'Fring', 'gus@gmail.com')";
        $sql3 = "INSERT INTO Guests(firstname, lastname, email) VALUES('Walter', 'White', 'walter@gmail.com')";
        
        // executing each SQL query
        $array = array($sql1, $sql2, $sql3);
        foreach($array as $sql) {
            $conn -> exec($sql);
            // informing user about what happened
            echo "A row was inserted.<br>";
        }       
        
    } catch(PDOException $e) {
        echo $e -> getMessage();
    }
    
    // closing connection
    $conn = null;
?>