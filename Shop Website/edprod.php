<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XYZ Shop/about</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section>
        <!--header-->
        <header>
            <a class="logo">XYZ<span>Shop</span></a>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="Products.html">Products</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="SignUp.html">Sign Up</a></li>
                <li><a href="SignIn.html">Sign In</a></li>
                <li><a href="Adminlog.html">Admin</a></li>
                <li><a href="logout.php">Sign Out</a></li>
            </ul>
</header>

</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "Drashti@1726";
$database = "xyzshop";

$conn = new mysqli($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

echo '<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>';

if ($num > 0) {
    echo '<table>
        <tr>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Colour</th>
            <th>Launch Date</th>
            <th>Action</th>
        </tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
            <td>' . $row['proname'] . '</td>
            <td>' . $row['description'] . '</td>
            <td>' . $row['price'] . '</td>
            <td>' . $row['colour'] . '</td>
            <td>' . $row['launch'] . '</td>
            <td>
                <form method="post">
                    <button type="submit" name="edit" value="' . $row['proname'] . '">Edit</button>
                    <button type="submit" name="delete" value="' . $row['proname'] . '">Delete</button>
                </form>
            </td>
        </tr>';
    }

    echo '</table>';
} else {
    echo 'No records found.';
}

echo '</body>
</html>';

if (isset($_POST['delete'])) {
    $productId = $_POST['delete'];
    $deleteSql = "DELETE FROM products WHERE proname= '$productId'";
    $deleteResult = mysqli_query($conn, $deleteSql);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

if (isset($_POST['edit'])) {
    $productId = $_POST['edit'];
    header("Location: 2ndtrial.php?proname=$productId");
    exit();
}
?>