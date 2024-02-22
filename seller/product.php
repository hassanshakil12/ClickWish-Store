<?php
include("./connection.php");
session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) {
    $loggedIn = false;
    header('../user/login.php');
} else {
    $loggedIn = true;
    $sellerId = $_SESSION['id'];
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
            <form method="POST" enctype="multipart/form-data">
                <div class="top">
                    <input type="text" placeholder="Enter Product Name" name="pName" required>
                    <input type="text" placeholder="Enter Product Price" name="pPrice" required>
                    <input type="number" placeholder="Enter Product Quantity" name="pQuantity" required>
                </div>
                <div class="center">
                    <input type="file" name="prodImage" required>

                    <select name="pCategory">
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
                <textarea name="pDesc" cols="30" rows="10" placeholder="Add Product Description" required></textarea>
                <input type="submit" value="Add Product" name="addProduct" class="btn">
            </form>
        </div>
    </div>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>

<?php
if ($loggedIn) {
    if (isset($_POST["addProduct"])) {
        $prodName = $_POST["pName"];
        $prodPrice = $_POST["pPrice"];
        $prodQty = $_POST["pQuantity"];

        $filename = $_FILES["prodImage"]["name"];
        $tmpname = $_FILES["prodImage"]["tmp_name"];
        $path = '../Assets/Product/' . $filename;
        move_uploaded_file($tmpname, $path);

        $prodCategory = $_POST["pCategory"];
        $prodDesc = $_POST["pDesc"];

        $query = "INSERT INTO product_details (seller_id, name, image, price, quantity, category, description) VALUES ('$sellerId', '$prodName', '$path', '$prodPrice', '$prodQty', '$prodCategory', '$prodDesc')";
        mysqli_query($conn, $query);
    }
}
?>