<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Student View</title>
</head>

<body>
    <?php
    // using isset() when checking keys in arrays appears to be the best way
    if ($_SESSION["role"] === "Student") {

        // logout user if he clicks the log out button and remove the session
        if(isset($_POST['logout'])) {
            // Unset all session variables
            $_SESSION = array();
         
            // Destroy the session
            session_destroy();

            //redirect user to the login page
            header("Location: ../login.php");
            exit;
        }

        $user_id = $_SESSION["id"];
        $db = new PDO('sqlite:../eokul.db');
        $stmt = $db->prepare('SELECT lesson_id, midterm1, midterm2, final FROM grades WHERE user_id = ?');
        $stmt->execute([$user_id]);
        echo '<h1 class="text-center my-5 fw-bold">Grades</h1>';
        echo '<table class="table table-striped w-50 m-auto mt-5 border text-center">';
        echo '<tr><th scope="col">#</th><th scope="col">Lesson</th><th scope="col">Midterm 1</th><th scope="col">Midterm 2</th><th scope="col">Final</th></tr>';
        $counter = 1;
        // HTML Table
        foreach ($stmt as $row) {
            echo '<tr><th scope="row">' . $counter . '</th>';
            echo '<td>' . $row['lesson_id'] . '</td>';
            echo '<td>' . $row['midterm1'] . '</td>';
            echo '<td>' . $row['midterm2'] . '</td>';
            echo '<td>' . $row['final'] . '</td></tr>';
            $counter++;
        }  
        // End the HTML table
        echo '</table>';

        echo '<div class="text-center my-5"><form method="post"><button type="submit" name="logout" class="btn btn-warning">Log out</button></form></div>';

    } else {
        // if user is not authenticated redirect him to the login.php
        header("Location: ../login.php");
        exit;
    } ?>
</body>

</html>