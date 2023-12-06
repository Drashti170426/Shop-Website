<?php
if($_SERVER ['REQUEST_METHOD'] = 'post')
{
    $email = $_POST['email'];
    $name = $_POST['name'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $image = $_POST['image'];

    
    $encryptedpassword= password_hash($password,PASSWORD_DEFAULT);


        $servername = "localhost";
        $username = "root";
        $password1 = "Drashti@1726";
        $database = "xyzshop";

        $conn=mysqli_connect($servername, $username, $password1, $database);
    
        if(!$conn){
            die("error:".mysqli_connect_error());
        }
        else{
            $sql="INSERT INTO `signup` (`email`, `name`, `user`, `password`, `image`) VALUES ('$email', '$name', '$user', '$encryptedpassword', '$image')";
            $result=mysqli_query($conn, $sql);
    
            if($result)
            {
               echo "Information Updated";
               header("Location: submit.html");
               exit;
            }
            else
            {
                echo "Please check the entered information and enter valid input".mysqli_error($conn);
            }
        }  
    
    $sql= "SELECT * FROM `signup`";
    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);
    echo "</br>";
    echo $num;

    while($row = mysqli_fetch_assoc($result))
    {
        echo "<br/>";
        echo "User Records";
        echo "<br/>";
        echo "Email".$row['email']. "Name:".$row['name']. "Username:".$row['user']. "Password:".$row['password'];
        header("Location: submit.html");
               exit;
    }


    }
?>
