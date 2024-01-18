<?php
include("./connection.php");
session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) {
    header('location: ../user/login.php');
    $loggedIn = false;
} else {
    $loggedIn = true;
}

$id = $_GET['ID'];

$query = "SELECT * FROM `product_details` WHERE id = $id";
$data = mysqli_query($conn, $query);

$row = mysqli_fetch_array($data);

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productQuantity = $_POST['productQuantity'];
    $category = $_POST['category'];

    $query = "UPDATE `product_details` SET `name`='$productName',`price`='$productPrice',`quantity`='$productQuantity',`category`='$category' WHERE id = $id";
    mysqli_query($conn, $query);
    header("location: index.php");
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
    <link rel="stylesheet" href="style/update.css">
    <title>Update Product</title>
</head>
<body>
    <?php include("navbar.php")?>
    <div class="main" style="min-height: 100vh;">
        <center>
            <form action="" method="post">
                <h1>Product Update</h1>
                <input type="text" value="<?php echo $row['name']?>" name="productName" placeholder="Product Name" required>
                <input type="number" value="<?php echo $row['price'] ?>" name="productPrice" placeholder="Product Price" required>
                <input type="file" class="img" name="productImage" placeholder="Upload Images">
                <input type="number" value="<?php echo $row['quantity'] ?>" name="productQuantity" placeholder="Product Quantity" required>

                <select name="category"  value="<?php echo $row['category'] ?>">
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

                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                <input type="submit" value="Update Product" class="btn" name="update">
            </form>
        </center>
    </div>
</body>
</html>