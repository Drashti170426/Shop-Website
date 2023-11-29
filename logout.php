<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

  <footer class="footer">
        <div class="main">
            <div class="row">
                <div class="footer_col">
                    <h4>Get Help</h4>
                    <ul>
                        <li><a href="support.html">shiping</a></li>
                        <li><a href="support.html">returns</a></li>
                        <li><a href="support.html">payment options</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>

<?php
  session_start();
  session_unset();
  session_destroy();
  header('location:signin.html');
?>