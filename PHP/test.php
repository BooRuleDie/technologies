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
	echo "hello from xampp<br>";

	# php is not case sensitive about the keywords like:
	# if, else, echo, while, for ...
	echo "I'm not case sensitive<br>";
	# however it's not the same in defining and calling variables, be careful about that

	$color = "red";

	echo "My Fav color is " . $color . "<br>";

	$num = 5 + /* cool way to comment*/ 5;
	
	// print can be used to display values instead of echo
	print "I'm printed by using print" . "<br>";
	
	// , can be used to concat strings as well
	echo "This ", "string ", "was ", "made ", "with multiple parameters.<br>";
	
	// PHP allows you to use both ' and " to define strings as in Python.
	$str = "string1";
	$str2 = 'string2';

	// var_dump() method can be used to get the data type and the value at the same time
	$int_var = 13;
	var_dump($int_var); // int(13)

	// This is how you define arrays in PHP

	$array = array("str1", "str2", 1, 1.3, true, false, array("array inside array"));
	var_dump($array);
	echo "<br>";

	// Classes and Objects
	class Car {
		public $model;
		public $color;

		public function __construct($model, $color) {
			$this -> model = $model; // same as this.model = model
			$this -> color = $color;
		}
		public function showoff(){
			echo "My car is " . $this -> color . " and it's model is " . $this -> model . "<br>";
		}
	}

	$car1 = new Car("Volvo", "blue");
	$car1 -> showoff();
	
	// The last type is the NULL which is the same thing as None in Python
	$none_var = NULL;
	?>

	

</body>

</html>