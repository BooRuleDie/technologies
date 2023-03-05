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
    while(true) {
        echo "Just run one time <br>";
        break;
    }

    do {
        echo "I'm going to run even though the condition is false, that's the neat part of using do-while ;loop. Even though your condition is not true, the body part runs at least one time.";
    }while(false);

    for($i = 0; $i < 10; $i++){
        echo "index: $i<br>";
    }

    $dictInArray = array("Ben" => 1, "Sarah" => 2, "Kevin" => 3);

    foreach($dictInArray as $key => $value) {
        echo "$key: $value<br>";
    }
    ?>
</body>
</html>