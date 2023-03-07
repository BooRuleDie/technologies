<?php 

// PHP filters are used to validate and sanitize the user inputs in order to see that PHP filters offers when use the following foreach loop

foreach(filter_list() as $id => $filter) {
    echo "$filter: " . filter_id($filter) . "<br>";
}

// Sanitize Strings
$string = "<html><body>Content of the html document.</body></html>";
$filtered = filter_var($string, FILTER_UNSAFE_RAW); // FILTER_SANITIZE_STRING is deprecated
echo $filtered . "<br><br>";

// Validate Integer
$integer = 100;
$float = 100.1;

$isInteger1 = filter_var($integer, FILTER_VALIDATE_INT); // returns 100
$isInteger2 = filter_var($float, FILTER_VALIDATE_INT); // returns nothing
echo $isInteger1 . "<br>";
echo $isInteger2 . "<br>";

// Validate an IPv4 address

$validIPv4 = "192.168.1.1";
$invalidIPv4 = "192.256.1.1";

$validated1 = filter_var($validIPv4, FILTER_VALIDATE_IP); // returns 192.168.1.1
$validated2 = filter_var($invalidIPv4, FILTER_VALIDATE_IP); // returns nothing

echo "var1: $validated1<br>var2: $validated2<br><br>";

// Sanitize and Validate email address

$email = "test.test+hulolo@gmail.com";

echo "Before sanitization: $email<br>";
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
echo "After sanitization: $email<br>";

if (empty(filter_var($email, FILTER_VALIDATE_EMAIL))) {
    echo "Email is not valid.<br>";
}else {
    echo "Thanks for the email<br>";
}

// We can do the same for the URLs

$url = "http://urlhulolo.com";
$url = filter_var($url, FILTER_SANITIZE_URL);

if (empty(filter_var($url, FILTER_VALIDATE_URL))) {
    echo "URL is not valid";
} else {
    echo "The URL: $url";
}
?>