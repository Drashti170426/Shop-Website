<?php
$servername = "localhost";
$username = "root";
$password = "Drashti@1726";
$database = "xyzshop";


$conn = new mysqli($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['update'])) {
    $productId = $_POST['proname'];
    $proname = $_POST['proname'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $colour = $_POST['colour'];
    $launch = $_POST['launch'];

    $updateSql = "UPDATE products SET proname = '$proname', description = '$description', price = '$price', colour = '$colour', launch = '$launch' WHERE proname = '$productId'";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        header("Location: edprod.php");
        exit();
    } else {
        echo 'Error updating product data.';
    }
} else {
    echo 'Invalid request.';
}
?>