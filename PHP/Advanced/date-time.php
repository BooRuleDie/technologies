<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
    <?php
    echo "Today is " . date("d-m-Y") . "<br>";
    echo "Today is " . date("d/m/Y") . "<br>";
    echo "Today is " . date("d.m.Y") . "<br>";
    echo "Today is " . date("l") . "<br>"; // day of the week
    ?>

    <!-- Copyright automatic update thanks to PHP -->
    <h1> &copy; 2012-<?php echo date("Y") ?></h1>

    <?php 
    
    //other formats we can use:
        // H - 24-hour format of an hour (00 to 23)
        // h - 12-hour format of an hour with leading zeros (01 to 12)
        // i - Minutes with leading zeros (00 to 59)
        // s - Seconds with leading zeros (00 to 59)
        // a - Lowercase Ante meridiem and Post meridiem (am or pm)

        echo date("m-d-Y h:m:s a") . "<br>"; // 03-05-2023 01:03:02 pm
        // It's important to note that date() function will return the date of the server

        // If you want to get the right result for the date and time values you can set the timezone like that:
        date_default_timezone_set("Asia/Istanbul");
        echo date("m-d-Y h:m:s a") . "<br>";

        // creating epoch value and formatting 
        $date = mktime(12,30,45,3,10,2019); // -> epoch value 
        echo date("m/d/Y h:i:s a", $date) . "<br>";

        // We can also create different formats from Date strings using strtotime()
        $date_string = strtotime("10:30pm April 15 2014");
        echo date("Y.m.d H:i:s a", $date_string) . "<br><br>";

        // strtotime() is quite clever about converting strings into time as you can see from the examples below:
        $date1 = strtotime("yesterday");
        echo date("Y-m-d h:i:sa", $date1) . "<br>";

        $date2 = strtotime("next Wednesday");
        echo date("Y-m-d h:i:sa", $date2) . "<br>";

        $date3 = strtotime("-3 Months");
        echo date("Y-m-d h:i:sa", $date3) . "<br>";
            
    ?>

    

</body>
</html>