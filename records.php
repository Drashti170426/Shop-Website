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

echo '</body>
</html>';
?>