<?php
include("./connection.php");
session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) {
    $loggedIn = false;
    header('../user/login.php');
} else {
    $loggedIn = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/product.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>My Products</title>
</head>

<body>
    <?php include("./navbar.php"); ?>
    <div class="main">
        <div class="top">
            <h1>My Products.</i></h1>
        </div>
        <div class="middle">
            <form method="POST">
                <div class="top">
                    <input type="text" placeholder="Enter Product Name" name="pName" required>
                    <input type="text" placeholder="Enter Product Price" name="pPrice" required>
                    <input type="number" placeholder="Enter Product Quantity" name="pQuantity" required>
                </div>
                <div class="center">
                    <input type="file" name="p_name" required>

                    <select name="category">
                        <option selected>--Select Category--</option>
                        <option value="Clothing" name="category">Fashion & Clothing</option>
                        <option value="Electronics" name="category">Electronics & Appliances</option>
                        <option value="Devices" name="category">Phones & Laptops</option>
                        <option value="Food" name="category">Food & Beverages</option>
                        <option value="Sports" name="category">Sports & Fitness</option>
                        <option value="Home" name="category">Home & Decor</option>
                        <option value="Entertainment" name="category">Gaming & Entertainment</option>
                        <option value="Stationary" name="category">Books & Stationary</option>
                    </select>
                </div>

                <input type="submit" value="Add Product" name="addProduct" class="btn" required>
            </form>
        </div>
    </div>
</body>

</html>