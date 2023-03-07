<?php 
    // callback functions or callbacks are functions that are passed to other functions as arguments of the function. For example in the following code customFunc() is passed to array_map() function in order to get the all lengths of strings in a particular array.

    function customFunc($item) {
        return strlen($item);
    }

    $array = array("1", "22", "333", "4444", "55555");
    $lengths = array_map("customFunc", $array);
    print_r($lengths);
    echo "<br><br>";

    // we can also do the same thing using anonymous functions 
    $lengths2 = array_map(function($item){
        return strlen($item);
    }, $array);
    print_r($lengths2);

    // callback functions can be used in the user-defined functions as well

    function sanitizeAndValidateURL($url){
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = filter_var($url, FILTER_VALIDATE_URL);
        if (!empty($url)){
            return $url;    
        }else {
            return "Invalid URL";
        }
    }

    function sanitizeAndValidateEmail($email){
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!empty($email)){
            return $email;    
        }else {
            return "Invalid Email.";
        }
    }

    function sanitizeAndValidateSth($thing, $optionToValidate) {
        $result = $optionToValidate($thing);
        return $result;
    }
    echo "<br><br>";
    echo sanitizeAndValidateSth("http://example.com", "sanitizeAndValidateURL");
?>