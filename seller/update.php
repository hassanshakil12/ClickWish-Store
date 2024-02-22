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

$id = $_GET['ID'];
$query = "SELECT * FROM product_details WHERE id='$id'";
$data = mysqli_query($conn, $query);
$row = mysqli_fetch_array($data);

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
                    <input type="text" value="<?php echo $row['name'] ?>" name="pName" required>
                    <input type="text" value="<?php echo $row['price'] ?>" name="pPrice" required>
                    <input type="number" value="<?php echo $row['quantity'] ?>" name="pQuantity" required>
                </div>
                <div class="center">
                    <input type="file" name="prodImage" required>

                    <select name="pCategory">
                        <option disabled hidden>--Select Category--</option>
                        <option <?php if ($row['description'] == "Clothing") {
                                    echo "selected";
                                } ?> value="Clothing" name="category">Fashion & Clothing</option>
                        <option <?php if ($row['description'] == "Electronics") {
                                    echo "selected";
                                } ?> value="Electronics" name="category">Electronics & Appliances</option>
                        <option <?php if ($row['description'] == "Devices") {
                                    echo "selected";
                                } ?> value="Devices" name="category">Phones & Laptops</option>
                        <option <?php if ($row['description'] == "Food") {
                                    echo "selected";
                                } ?> value="Food" name="category">Food & Beverages</option>
                        <option <?php if ($row['description'] == "Sports") {
                                    echo "selected";
                                } ?> value="Sports" name="category">Sports & Fitness</option>
                        <option <?php if ($row['description'] == "Home") {
                                    echo "selected";
                                } ?> value="Home" name="category">Home & Decor</option>
                        <option <?php if ($row['description'] == "Entertainment") {
                                    echo "selected";
                                } ?> value="Entertainment" name="category">Gaming & Entertainment</option>
                        <option <?php if ($row['description'] == "Stationary") {
                                    echo "selected";
                                } ?> value="Stationary" name="category">Books & Stationary</option>
                    </select>
                </div>
                <textarea name="pDesc" cols="30" rows="10" required><?php echo $row['description'] ?></textarea>
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

        $query = "UPDATE product_details SET seller_id='$row[seller_id]', name='$prodName', image='$path', price='$prodPrice', quantity='$prodQty', category='$prodCategory', description='$prodDesc' WHERE id='$id'";
        mysqli_query($conn, $query);
        header("location: ./index.php");
    }
}
?>