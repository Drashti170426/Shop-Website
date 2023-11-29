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

        $sql = "SELECT * FROM signup WHERE user='$user'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $decrptedpassword = password_verify($password, $row['password']);
    
            if ($decrptedpassword) {
                header("Location: index.html");
                exit;
            } else {
                echo "Invalid login credentials";
                header("Location: login.html");
                exit;
            }
        }
    }
}
?>