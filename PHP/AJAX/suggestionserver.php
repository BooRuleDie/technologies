<?php

    // fake db of name suggestions
    $fakeDB = array(
        "Anna", "Brittany", "Cinderella", "Diana", "Eva", "Fiona", "Gunda", "Hege", "Inga", "Johanna", "Kitty", "Linda", "Nina", "Ophelia", "Petunia", "Amanda", "Raquel", "Cindy", "Doris", "Eve", "Evita", "Sunniva", "Tove", "Unni", "Violet", "Liza", "Elizabeth", "Ellen", "Wenche", "Vicky"
    );

    // get the query 
    $query = $_GET["query"];

    // get results
    $suggestions = "";
    foreach($fakeDB as $name) {
        
        // if query is a substring of a name add it to the suggestions
        if (str_contains(strtolower($name), strtolower($query)) === true) { 
            $suggestions .= "$name, ";
        }
    }

    // send the data in HTTP response body
    echo $suggestions === "" ? "No suggestion :(" : $suggestions;

?>