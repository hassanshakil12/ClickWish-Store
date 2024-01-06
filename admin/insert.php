<?php
include("../user/connection.php");
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
    if($data){
        echo "<script>alert('Record Uploaded Successfully')</script>";
    } else{
        echo "<script>alert('Record Failed to Upload')</script>";
    }
}
?>