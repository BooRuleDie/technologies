<!DOCTYPE html>
<html>
<head>
    <title>ACM368</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<div class="container p-5">
    <h1 class="text-center mb-5 fw-bolder">Calculator with History</h1>
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <form method="post" class="border p-3 rounded">
                <div class="form-group text-center">
                    <label for="number1" class="fw-bold">First Number</label>
                    <input type="number" class="form-control" name="number1" id="number1">
                </div>
                <div class="form-group text-center">
                    <label for="number2" class="fw-bold">Second Number</label>
                    <input type="number" class="form-control" name="number2" id="number2">
                </div>
                <div class="form-group text-center">
                    <label for="operation" class="fw-bold">Choose the Operation</label>
                    <select name="operation" id="operation" class="form-control">
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">*</option>
                        <option value="/">/</option>
                    </select>
                </div>
                <div class="text-center" >
                    <button type="submit" class="btn btn-primary mt-3 mx-auto">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- 
        Be sure that you have calculation.db sqlite file in the same directory as calculatorwithhistory.php and run the following SQL command:
        ```CREATE TABLE "calculations" (
            "id" INTEGER,
            "number1" NUMERIC NOT NULL,
            "number2" NUMERIC NOT NULL,
            "result" NUMERIC NOT NULL,
            "operation"	TEXT NOT NULL,
            PRIMARY KEY("id")
        );
        ```
    -->
    <?php
    if ($_POST) {
        $number1 = floatval($_POST['number1']);
        $number2 = floatval($_POST['number2']);
        $operation = $_POST['operation'];

        if (empty($number1) || empty($number2) || empty($operation)) {
            exit();
        }

        switch ($operation) {
            case '+':
                $result = $number1 + $number2;
                break;
            case '-':
                $result = $number1 - $number2;
                break;
            case '*':
                $result = $number1 * $number2;
                break;
            case '/':
                $result = $number1 / $number2;
                break;
            default:
                echo "Invalid operation";
                exit();
        }
        
        $db = new PDO('sqlite:calculations.db');
        $stmt = $db->prepare('INSERT INTO calculations (number1, number2, result, operation) VALUES (?, ?, ?, ?)');
        $stmt->execute([$number1, $number2, $result, $operation]);
    }
        $db = new PDO('sqlite:calculations.db');
        $rows = $db->query('SELECT number1, number2, result, operation FROM calculations ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($rows)) {
            echo '<hr class="my-5">';
            echo '<h2 class="text-center my-5 fw-bolder">Calculation History</h2>';
            echo '<div class="row justify-content-center text-center">';
            foreach ($rows as $row) {
                
                echo '<div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 border p-3 rounded m-3">';
                echo '<p class="fw-bold">First Number: <span style="color:green;">' . $row['number1'] . '</span></p>';
                echo '<p class="fw-bold">Second Number: <span style="color:green;">' . $row['number2'] . '</span></p>';
                echo '<p class="fw-bold">Operation: <span style="color:green;">' . $row['operation'] . '</span></p>';
                echo '<p class="fw-bold">Result: <span style="color:green;">' . $row['number1'] . $row['operation'] . $row['number2'] . ' = ' . $row['result'] . '</span></p>';
                echo '</div>';
                
            }
            echo '</div>';
        }
    ?>

</div>
</body>
</html>
