<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin View</title>
</head>

<body>
    <?php
    // using isset() when checking keys in arrays appears to be the best way
    if ($_SESSION["role"] === "Administrator") {

        // logout user if he clicks the log out button and remove the session
        if (isset($_POST['logout'])) {
            // Unset all session variables
            $_SESSION = array();

            // Destroy the session
            session_destroy();

            //redirect user to the login page
            header("Location: ../login.php");
            exit;
        }

        if(isset($_POST["register_user"])) {
            $name = $_POST["name"];
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $role = $_POST["role"];
            $id = uniqid("eokul_", true);
        
            try {
                $db = new PDO('sqlite:../eokul.db');
                $stmt = $db->prepare('INSERT INTO users (id, name, password, role) VALUES (?, ?, ?, ?)');
                $stmt->execute([$id, $name, $password, $role]);
        
                echo '<div class="text-center"><div class="alert alert-success mt-3" role="alert" style="width:25%; margin: 0 auto;">User Created Successfully</div>';
            } catch(PDOException $ex) {
                echo '<div class="text-center"><div class="alert alert-danger mt-3" role="alert" style="width:25%; margin: 0 auto;">An Error Occurred</div>';
            }
        }  
        
        if(isset($_POST["register_lesson"])) {
            $lesson_id = strtoupper($_POST["lesson_id"]) ;
        
            try {
                $db = new PDO('sqlite:../eokul.db');
                $stmt = $db->prepare('INSERT INTO lessons (id) VALUES (?)');
                $stmt->execute([$lesson_id]);
        
                echo '<div class="text-center"><div class="alert alert-success mt-3" role="alert" style="width:25%; margin: 0 auto;">Lesson Created Successfully</div>';
            } catch(PDOException $ex) {
                echo '<div class="text-center"><div class="alert alert-danger mt-3" role="alert" style="width:25%; margin: 0 auto;">The Lesson Exists Already</div>';
            }
        }

        if(isset($_POST["register_grade"])) {
            $student_id = $_POST["student_id"];
            $teacher_id = $_POST["teacher_id"];
            $lesson_id = $_POST["lesson_id"];
        
            try {
                $db = new PDO('sqlite:../eokul.db');
                $stmt = $db->prepare('INSERT INTO grades (user_id, lesson_id, teacher_id) VALUES (?, ?, ?)');
                $stmt->execute([$student_id, $lesson_id, $teacher_id ]);
        
                echo '<div class="text-center"><div class="alert alert-success mt-3" role="alert" style="width:25%; margin: 0 auto;">Assignment Successful</div>';
            } catch(PDOException $ex) {
                echo '<div class="text-center"><div class="alert alert-danger mt-3" role="alert" style="width:25%; margin: 0 auto;">An Error Occurred</div>';
            }
        }  

        echo '<h1 class="text-center fw-bold my-5">Register User</h1>';
        echo '<div class="container w-50 border px-5 pb-3 pt-3 fw-bold text-center"><form method="post">
        <div class="mb-3">
          <label for="name" class="form-label">Name Surname</label>
          <input type="text" class="form-control text-center" id="name" placeholder="Osman Gültekin" name="name">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control text-center" id="name" placeholder="*******" name="password">
        </div>
        <label class="form-label">Role</label>
        <select class="form-select mb-3 fw-bold" name="role">
          <option selected>Student</option>
          <option>Teacher</option>
          <option>Administrator</option>
          
        </select>
        <button type="submit" class="btn btn-primary" name="register_user">Register</button>
        </form></div>';

        echo '<hr class="my-5 w-50 m-auto">';

        echo '<h1 class="text-center fw-bold my-5">Register Lesson</h1>';
        echo '<div class="container w-50 border px-5 pb-3 pt-3 fw-bold text-center"><form method="post">
        <div class="mb-3">
          <label for="name" class="form-label">Lesson Code</label>
          <input type="text" class="form-control text-center" id="name" placeholder="ACM321" name="lesson_id">
        </div>
        <button type="submit" class="btn btn-primary" name="register_lesson">Register</button>
        </form></div>';

        echo '<hr class="my-5 w-50 m-auto">';

        echo '<h1 class="text-center fw-bold my-5">Assign Lesson</h1>';
        $db = new PDO('sqlite:../eokul.db');
        $students = $db->prepare("SELECT id, name FROM users WHERE role = 'Student'");
        $students->execute();
        $studentSelectElement = '<p class="fw-bold text-center">Student</p><select class="form-select mb-3 fw-bold" name="student_id">';
        foreach($students as $student) {
            $studentSelectElement .= '<option value='. $student["id"] .'>'. $student["name"] .'</option>';
        }
        $studentSelectElement .= "</select>";

        $teachers = $db->prepare("SELECT id, name FROM users WHERE role = 'Teacher'");
        $teachers->execute();
        $teacherSelectElement = '<p class="fw-bold text-center">Teacher</p><select class="form-select mb-3 fw-bold" name="teacher_id">';
        foreach($teachers as $teacher) {
            $teacherSelectElement .= '<option value='. $teacher["id"] .'>'. $teacher["name"] .'</option>';
        }
        $teacherSelectElement .= "</select>";

        $lessons = $db->prepare("SELECT id FROM lessons");
        $lessons->execute();
        $lessonSelectElement = '<p class="fw-bold text-center">Lesson</p><select class="form-select mb-3 fw-bold" name="lesson_id">';
        foreach($lessons as $lesson) {
            $lessonSelectElement .= '<option value='. $lesson["id"] .'>'. $lesson["id"] .'</option>';
        }
        $lessonSelectElement .= "</select>";

        // write all student, teacher, lesson HTML elements
        echo '<div class="container w-50 border px-5 pb-3 pt-3 fw-bold text-center"><form method="post">
        <div class="mb-3">
          '. $studentSelectElement . $teacherSelectElement . $lessonSelectElement .'
        <button type="submit" class="btn btn-primary" name="register_grade">Register</button>
        </form></div>';

        echo "</div>";

        // logout button
        echo '<div class="text-center my-5"><form method="post"><button type="submit" name="logout" class="btn btn-warning">Log out</button></form></div>';
    } else {
        // if user is not authenticated redirect him to the login.php
        header("Location: ../login.php");
        exit;
    } ?>
</body>

</html>