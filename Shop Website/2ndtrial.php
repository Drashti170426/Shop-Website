<?php
$servername = "localhost";
$username = "root";
$password = "Drashti@1726";
$database = "xyzshop";

$conn = new mysqli($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['proname'])) {
    $productId = $_GET['proname'];

    $selectSql = "SELECT * FROM products WHERE proname = '$productId'";
    $selectResult = mysqli_query($conn, $selectSql);

    if ($selectResult) {
        $productData = mysqli_fetch_assoc($selectResult);

        echo '<html>
        <head>
            <link rel="stylesheet" href="css/styleEdit.css">
        </head>
        <body>
            <h2>Edit Product</h2>
            <form method="post" action="3rd.php">
                <input type="hidden" name="product_id" value="' . $productData['proname'] . '">
                <label for="proname">Product Name:</label>
                <input type="text" name="proname" value="' . $productData['proname'] . '"><br>
                <label for="description">Description:</label>
                <textarea name="description">' . $productData['description'] . '</textarea><br>
                <label for="price">Price:</label>
                <input type="text" name="price" value="' . $productData['price'] . '"><br>
                <label for="colour">Colour:</label>
                <input type="text" name="colour" value="' . $productData['colour'] . '"><br>
                <label for="launch">Launch Date:</label>
                <input type="text" name="launch" value="' . $productData['launch'] . '"><br>
                <button type="submit" name="update">Update</button>
            </form>
        </body>
        </html>';
    } else {
        echo 'Error fetching product data.';
    }
} else {
    echo 'Product ID not provided.';
}
?>