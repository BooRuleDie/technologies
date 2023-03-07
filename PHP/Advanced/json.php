<?php 
    // There are two main built-in functions to encode and decoded JSON in PHP
    // json_encode() and json_decode()
    // we can use json_encode() to convert dictionary or map like objects to JSON
    $array = array("key1" => "value1", "key2" => "value2", "key3" => "value3");
    echo print_r($array) . "<br><br>";
    echo json_encode($array);
    echo "<br><br>";

    // and as you can guess json_decode() is used to convert a JSON object into PHP objects.
    $json_string = '{"key1":"value1","key2":"value2","key3":"value3"}';
    print_r(json_decode($json_string));
    echo "<br>";
    // if you set the second argument to true, it diretly converts JSON object into an PHP Associative Array object (map or dictionary).
    print_r(json_decode($json_string, true));
    
    // However if you'd like to use stdClass Object you can access values by using the following syntax:
    echo "<br><br>";

    $obj = json_decode($json_string);
    echo $obj -> key1 . "<br>";
    echo $obj -> key2 . "<br>";
    echo $obj -> key3 . "<br>";

    // or you can use a foreach loop
    foreach($obj as $key => $value) {
        echo "$key: $value<br>";
    }

?>