<?php 
    $hostname = "localhost";
    $username = "root"; // be sure that user has enough permission to create a database
    $password = "mysql";

    try {
        // create connection
        // using PDO instead of mysqli this time
        $conn = new PDO("mysql:host=$hostname", $username, $password);

        // set the PDO error mode to exception
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // create database 
        $sql = "CREATE DATABASE createdDB";
        $conn -> exec($sql);

        echo "createdDB has been created!<br>";
        
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e -> getMessage();
    }
    
    // closing connection
    $conn = null;
?>