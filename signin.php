<?php
if($_SERVER ['REQUEST_METHOD'] = 'post')
{
    $user = $_POST['user'];
    $password = $_POST['password'];


        $servername = "localhost";
        $username = "root";
        $password2 = "Drashti@1726";
        $database = "xyzshop";

        
    $conn = mysqli_connect($servername, $username, $password2, $database);

    if (!$conn) {
        die("error:" . mysqli_connect_error());
    } else {

        $sql = "SELECT * FROM signup WHERE user='$user' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                header("Location: index.html");
                exit;
            } else {
                header("Location: signin.html");
                exit;
            }
        } 
    }
}
?>