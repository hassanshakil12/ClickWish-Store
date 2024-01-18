<?php
include("./connection.php");
echo  $id = $_GET['ID'];

$query = "SELECT * FROM `product_details` WHERE id = $id";
$data = mysqli_query($conn, $query);

$row = mysqli_fetch_array($data);

$query2 = "INSERT INTO `cart_details`(`name`, `price`, `category`) VALUES ('$row[name]','$row[price]','$row[category]')";
mysqli_query($conn, $query2);

header("location: ./cart/index.php");
?>