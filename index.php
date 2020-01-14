<?php

// Error reporting
ini_set("'display_errors', 1");
error_reporting(E_ALL);

$array = array('choc' => 'Chocolate', 'coffee' => 'Coffee', 'cac' => 'Cookies & Cream', 'punicorn' => 'Purple Unicorn', 'vanilla' => 'Vanilla');

$name = $_POST['name'];
$selected = $_POST['item'];
$nameErr = $checkErr = "";
$valid = 0;
$skills = (isset($_POST['item'])) ? $_POST['item'] : array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($name)) {
        $nameErr = "* Name is required";
    }
    if (!isset($selected)) {
        $checkErr = "* Atleast one selection is required";
    }
    if ($nameErr == "" && $checkErr == "") {
        $valid = 1;
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

    <title>Cupcakes</title>
</head>
<body>
<?php
if ($valid == 0) {

    ?>
    <form method="post" class="container mt-3">
        <h1>Cupcake Fundraiser</h1>

        <div class="form-group">
            <label for="name">Your name:</label><br>
            <input type="text" name="name" class="form-control w-25 d-inline" placeholder="Input your name here">
            <span class="error text-danger d-inline"><?php echo $nameErr; ?></span>
        </div>

        <div class="form-check">
            <p class="error text-danger d-inline"><?php echo $checkErr; ?></p><br>

            <?php
            foreach ($array as $key => $value) {
                echo "<label><input type='checkbox' name='item[]' value='$value' class='form-check-input'>$value</label><br>";
            }
            ?>
        </div>

        <button id="submit" type="submit" class="btn btn-info">Submit order</button>
    </form>
    <?php
}
?>

<?php
if ($valid == 1) {
    if(!empty($selected)){
        $checked_count = count($_POST['item']) * 3.50;

        echo "<div class='container'><p>Thank you, ".$name.", for your order!</p>";

        echo "Order summary: <ul>";
        foreach ($selected as $key => $value) {
            echo "<li>".$value."</li>";
        }
        echo "</ul>";

        echo "<p>Order total: ".number_format((float)$checked_count, 2, '.', '')."</p></div>";
    }
}
?>

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
