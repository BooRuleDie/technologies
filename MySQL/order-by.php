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
        
        // fetch data and print
        $query = $conn -> query("SELECT * from Guests ORDER BY firstname;");
        // set Fetch mode to associative array (dictionay, key-value pair) it's easier to work with data like that
        $query -> setFetchMode(PDO::FETCH_ASSOC);
        $data = $query -> fetchAll();
        
        foreach ($data as $array) {
            foreach ($array as $key => $value) {
                echo "$key: $value<br>";
            }      
            echo "<br>";
        }
        
    } catch(PDOException $e) {
        echo "<br>" . $e -> getMessage();
    }
    
    // closing connection
    $conn = null;
?>