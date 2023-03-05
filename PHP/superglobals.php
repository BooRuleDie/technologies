<html>
<body>
<?php
    // Super globals are builtin in globar varibales that can be accessed from anywhere. Here are the list of supervariables:
    // $GLOBALS -> It's an array that stores all global variables, you access them by variable names
    // $_SERVER
    // $_REQUEST
    // $_POST
    // $_GET
    // $_FILES
    // $_ENV
    // $_COOKIE
    // $_SESSION

    // $_SERVER can be used to access all information about the server like PHP script name, name of the host, HTTP header information of the HTTP request that is made to the PHP script.
    echo $_SERVER['PHP_SELF'];
    echo "<br>";
    echo $_SERVER['SERVER_NAME'];
    echo "<br>";
    echo $_SERVER['HTTP_HOST'];
    echo "<br>";
    echo $_SERVER['HTTP_USER_AGENT'];
    echo "<br>";
    echo $_SERVER['SCRIPT_NAME'];

    // $_REQUEST is used to get data after a form is submitted to the script.  
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $name = $_REQUEST['fname'];
  if (empty($name)) { // you have to use empty here, just using the variables doesn't work unlike python
    echo "Name is empty";
  } else {
    echo $name;
  }
}

    // Instead of using $_REQUEST['fname'] we could have used $_POST['fnmame']
    // or if it was a GET request it could be $_GET['fname']
?>

    
</body>
</html>