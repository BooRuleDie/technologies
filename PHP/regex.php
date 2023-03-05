<?php
$regex_rule = "/hey/i"; // i -> case insensitive

$string = "hey Hey asdasda ashEydasd aasd ";
echo preg_match($regex_rule, $string) . "<br>"; // 1 if true, 0 if false
echo preg_match_all($regex_rule, $string) . "<br>"; // number of times of matched string
echo preg_replace($regex_rule, "CH4NG3D!!!", $string) . "<br>";
?>