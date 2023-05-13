<?php 
session_start() ;
if (isset($_SESSION['authenticatedUser'])){
    // is user is already authenticated redirect him to the view automatically
    header("Location: Views/" . strtolower($_SESSION["role"]) . "view.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <form class="border w-50 m-auto mt-5 pt-1 pb-3 rounded-1" method="post">
        <h1 class="text-center my-5 fw-bold">Login Page</h1>
        <div class="text-center w-50 m-auto">

            <div class="mb-3">
                <h4 class="fw-bold">eOkul ID</h4>
                <input type="text" pattern="eokul_\S+" class="form-control text-center" name="eokulid"  placeholder="eokul_645e0e634d7b07.01267406" required>
            </div>
            <div class="mb-3">
                <h4 class="fw-bold">Password</h4>
                <input type="password" class="form-control text-center" name="eokulpassword" placeholder="********" required>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary my-3">Submit</button>
        </div>
    </form>

    <?php

    // check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // get the values posted from the form
        $eokulId = $_POST['eokulid'];
        $password = $_POST['eokulpassword'];

        // check if all fields are not empty
        if (!empty($eokulId) && !empty($password)) {

            // connect to the SQLite database using PDO
            $db = new PDO('sqlite:eokul.db');

            // get the user's username and the password
            $stmt = $db->prepare('SELECT password, role FROM users WHERE id = ?');
            $stmt->execute([$eokulId]);
            $passwordInDb = '';
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $passwordInDb = $row["password"];
                $role = $row["role"];
            }

            // check if user's password is right
            if (password_verify($password, $passwordInDb)) {
                $_SESSION['authenticatedUser'] = true;
                $_SESSION['id'] = $eokulId;
                $_SESSION['role'] = $role;
                
                // redirect user
                header("Location: Views/" . strtolower($_SESSION["role"]) . "view.php");
                exit;
                
            } else {
                echo '<div class="text-center"><div class="alert alert-danger mt-3" role="alert" style="width:25%; margin: 0 auto;">Invalid ID or password</div></div>';
                exit;
            }
        }
    }
    ?>

    <!-- If users are not authenticated redirect them to here login.php -->

</body>

</html>