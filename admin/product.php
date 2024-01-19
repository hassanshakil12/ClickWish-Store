<?php
include("./connection.php");
session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true || $_session['email'] != 'admin@admin.com') {
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
    <link rel="stylesheet" href="./css/product.css">
    <title>Product</title>
</head>

<body>
    <?php include("./navbar.php") ?>
    <div class="main">
        <center>
            <form action="" method="post">
                <h1>Product Details</h1>
                <input type="text" name="productName" placeholder="Product Name" required>
                <input type="number" name="productPrice" placeholder="Product Price" required>
                <input type="file" class="img" name="productImage" placeholder="Upload Images">
                <input type="number" name="productQuantity" placeholder="Product Quantity" required>

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

                <input type="submit" value="Add Product" class="btn" name="submit">
            </form>
        </center>
    </div>
    <?php include("./footer.php") ?>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productQuantity = $_POST['productQuantity'];
    $category = $_POST['category'];

    // $productImage = $_FILES['productImage'];
    // $productImageLocation = $_FILES['productImage']['tmp_name'];
    // $productImageName = $_FILES['productImage']['name'];

    // move_uploaded_file($productImageLocation, "./product_images/".$productImageName);

    $query = "INSERT INTO `product_details`(`name`, `price`, `quantity`, `category`) VALUES ('$productName','$productPrice','$productQuantity','$category')";
    $data = mysqli_query($conn, $query);
    header("location: index.php");

    if($data){
        $productAdded = true;
    } else{
        $productAdded = false;
    }
}
?>