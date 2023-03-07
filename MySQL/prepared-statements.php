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
        
        // prepare the SQL and bind the parameters (prepared statements) notice that values are not specified directly
        $preparedStatement = $conn -> prepare("INSERT INTO Guests(firstname, lastname, email) VALUES(:firstname, :lastname, :email);");
        $preparedStatement -> bindParam(":firstname", $firstname);
        $preparedStatement -> bindParam(":lastname", $lastname);
        $preparedStatement -> bindParam(":email", $email);

        // data that will be inserted
        $array = array(
            ["firstname" => "Hank", "lastname" => "Schrader", "email" => "hank@gmail.com"],
            ["firstname" => "Jesse", "lastname" => "Pinkman", "email" => "jesse@gmail.com"],
            ["firstname" => "Hector", "lastname" => "Salamanca", "email" => "hector@gmail.com"]
        );
        
        // inserting data
        foreach ($array as $sqldict) {
            $firstname = $sqldict["firstname"];
            $lastname = $sqldict["lastname"];
            $email = $sqldict["email"];
            $preparedStatement -> execute();
            
            // informing user about what happened
            echo "A new record has been inserted.<br>";
        }
    
    // catch error
    } catch(PDOException $e) {
        echo "<br>" . $e -> getMessage();
    }
    
    // closing connection
    $conn = null;
?>