<?php
include("../user/connection.php");
session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) {
    header('location: ../user/login.php');
    $loggedIn = false;
} else {
    $loggedIn = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@100;300;400;500;700;800;900&family=Red+Hat+Display:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./style/product.css">
    <title>Product</title>
</head>
<body>
    <?php include("./navbar.php")?>
    <div class="main">
        <center>
        <form action="" method="post">
            <h1>Product Details</h1>
            <input type="text" name="productName" placeholder="Product Name" required>
            <input type="text" name="productPrice" placeholder="Product Price" required>
            <input type="file" class="img" name="productImage" placeholder="Upload Images" required>
            <input type="text" name="productQuantity" placeholder="Product Quantity" required>
            <div class="gndr">
                <select name="category">
                    <option selected>--Select Category--</option>
                    <option value="clothing">Fashion & Clothing</option>
                    <option value="electronics">Electronics & Appliances</option>
                    <option value="devices">Phones & Laptops</option>
                    <option value="food">Food & Beverages</option>
                </select>
            </div>
            
            <input type="submit" value="Add Product" class="btn" name="addProduct">
        </form>
        </center>
    </div>
</body>
</html>