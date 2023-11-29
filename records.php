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

$sql = "SELECT * FROM signup";

$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

echo '<html>
<head>
<link rel="stylesheet" href="css/styleAdmin.css">
</head>
<body>';

if ($num > 0) {
    echo '<table>
        <tr>
            <th>Email</th>
            <th>name</th>
            <th>User</th>
            <th>Passwords</th>
        </tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
            <td>' . $row['email'] . '</td>
            <td>' . $row['name'] . '</td>
            <td>' . $row['user'] . '</td>
            <td>' . $row['password'] . '</td>
        </tr>';
    }

    


    echo '</table>';
} else {
    echo 'No records found.';
}

echo '

</body>
</html>';
?>