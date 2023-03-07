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
        $sql = "SELECT * from Guests LIMIT 3, 5;"; // skip first 3 results and limit the number of results to 5
        // You can do the same thing by using following syntax:
        // SELECT * from Guests LIMIT 5 OFFSET 3;

        // prepare statement
        $preparedStatement =  $conn -> prepare($sql);

        // execute statement
        $preparedStatement -> execute();
        
        // set fetch mode to associate array (map, dictionary)
        $preparedStatement -> setFetchMode(PDO::FETCH_ASSOC);
        $data = $preparedStatement -> fetchAll();

        // print the result with a beautiful format
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