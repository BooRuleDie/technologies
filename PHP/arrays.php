<?php
    // In PHP there are three types of arrays:
    # 1. Indexed Arrays -> Normal Arrays
    # 2. Associative arrays -> Key Value Pairs
    # 3. Multidimensional arrays -> Nested Arrays

    $array = array(1,2,3,4);
    echo count($array) . "<br>"; // 4

    $associative_array = array("Ben" => 1, "Tom" => 1, "Gwen" => 1);
    echo $associative_array["Gwen"] . "<br>";

    foreach ($associative_array as $key => $value) {
        echo "$key: $value<br>";
    }

    // Sorting Arrays:
    // sort() - sort arrays in ascending order
    // rsort() - sort arrays in descending order
    // asort() - sort associative arrays in ascending order, according to the value
    // ksort() - sort associative arrays in ascending order, according to the key
    // arsort() - sort associative arrays in descending order, according to the value
    // krsort() - sort associative arrays in descending order, according to the key

    krsort($associative_array);
    foreach ($associative_array as $key => $value) {
        echo "$key: $value<br>";
    }
?>