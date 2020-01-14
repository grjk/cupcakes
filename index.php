<?php

// Error reporting
ini_set("'display_errors', 1");
error_reporting(E_ALL);

$array = array('choc' => 'Chocolate', 'coffee' => 'Coffee', 'cac' => 'Cookies & Cream', 'punicorn' => 'Purple Unicorn', 'vanilla' => 'Vanilla');

$name = $_POST['name'];
$selected = $_POST['checkbox'];
$nameErr = $checkErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($name)) {
        $nameErr = "* Name is required";
    }
    if(!isset($selected)) {
        $checkErr = "* Atleast one selection is required";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<form method="post" action="#.php" class="container mt-3">
    <h1>Cupcake Fundraiser</h1>

    <div class="form-group">
        <label for="name">Your name:</label><br>
        <input type="text" name="name" class="form-control w-25 d-inline" placeholder="Input your name here">
        <span class="error text-danger d-inline"><?php echo $nameErr; ?></span>
    </div>

    <div class="form-check">
        <p class="error text-danger d-inline"><?php echo $checkErr; ?></p><br>
        <?php
        $count = 0;
        foreach ($array as $item) {
            if ($count == 0) {
                echo "<label><input type='checkbox' name='checkbox' value='$array[$item]' class='form-check-input'>$item</label><br>";
            }
            else {
                echo "<label><input type='checkbox' name='checkbox' value='$array[$item]' class='form-check-input'>$item</label><br>";
            }
            $count++;
        }
        ?>
    </div>

    <button id="submit" type="submit" class="btn btn-info">Submit order</button>
</form>


<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>
</body>
</html>
