<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Teacher View</title>
</head>

<body>
    <?php
    // using isset() when checking keys in arrays appears to be the best way
    if (isset($_SESSION['authenticatedUser']) && $_SESSION["role"] === "Teacher") {

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

        // update student's grade 
        if (isset($_POST['update_user_grade'])) {
            $user_id = $_POST["user_id"];
            $teacher_id = $_POST["teacher_id"];
            $lesson_id = $_POST["lesson_id"];
            $midterm1 = $_POST["midterm1"];
            $midterm2 = $_POST["midterm2"];
            $final = $_POST["final"];

            $db = new PDO('sqlite:../eokul.db');
            $stmt = $db->prepare('UPDATE grades SET midterm1 = ?, midterm2 = ?, final = ? WHERE user_id = ? and lesson_id = ? and teacher_id = ?');
            $stmt->execute([$midterm1, $midterm2, $final, $user_id, $lesson_id, $teacher_id]);

            //redirect user to the same page 
            header("Location: teacherview.php");
            exit;
        }

        $user_id = $_SESSION["id"];
        $db = new PDO('sqlite:../eokul.db');
        $stmt = $db->prepare('SELECT DISTINCT lesson_id FROM grades WHERE teacher_id = ?');
        $stmt->execute([$user_id]);

        // fetch all lessons
        $lesson_ids = $stmt->fetchAll(PDO::FETCH_COLUMN);
        echo '<h1 class="text-center fw-bold my-5">Grade Students</h1>';
        
        // show all lessons in accordion format
        echo '<div class="accordion text-center w-50 m-auto" id="accordionExample">';
        foreach ($lesson_ids as $lesson_id) {

            // fetch names, midterm1, midterm2 and final results for a specific lesson
            $stmt = $db->prepare("SELECT users.id, users.name, grades.midterm1, grades.midterm2, grades.final FROM grades JOIN users ON grades.user_id = users.id WHERE grades.lesson_id = ? AND grades.teacher_id = ?");
            $stmt->execute([$lesson_id, $user_id]);
            $student_infos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // create the card's body with students' info
            $studentInfoCardBody = "";
            foreach ($student_infos as $student_info) {
                
                // add hr between student grade forms
                if ($studentInfoCardBody !== "") {
                    $studentInfoCardBody .= '<hr class="my-3">';  
                }

                $studentInfoCardBody .= '
                    <p class="text-center fw-bold">' . $student_info["name"] . '</p>
                    <form method="post">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="midterm1">Midterm 1</label>
                                <input type="text" id="midterm1" name="midterm1" class="form-control text-center" value="' . $student_info["midterm1"] . '">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="midterm2">Midterm 2</label>
                                <input type="text" id="midterm2" name="midterm2" class="form-control text-center" value="' . $student_info["midterm2"] . '">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="final">Final</label>
                                <input type="text" id="final" name="final" class="form-control text-center" value="' . $student_info["final"] . '">
                            </div>
                            <input type="hidden" name="user_id" value="'. $student_info["id"] .'">
                            <input type="hidden" name="lesson_id" value="'. $lesson_id .'">
                            <input type="hidden" name="teacher_id" value="'. $user_id .'">

                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-block" name="update_user_grade">Update</button>
                            </div>
                        </div>
                    </form>';
            }

            echo '<div class="card">
                    <div class="card-header" id="heading_' . $lesson_id . '">
                        <h2 class="mb-0">
                            <button class="btn fw-bold btn-link" type="button" data-toggle="collapse" data-target="#collapse_' . $lesson_id . '" aria-expanded="true" aria-controls="collapse_' . $lesson_id . '">
                                ' . $lesson_id . '
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_' . $lesson_id . '" class="collapse" aria-labelledby="heading_' . $lesson_id . '" data-parent="#accordionExample">
                        <div class="card-body">
                            ' . $studentInfoCardBody . '
                        </div>
                    </div>
                </div>';
        }

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