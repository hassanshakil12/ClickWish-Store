<?php
include("./connection.php");
$id = $_GET['ID'];

$query = "SELECT * FROM `product_details` WHERE id = $id";
$data = mysqli_query($conn, $query);

$row = mysqli_fetch_array($data);

$query2 = "INSERT INTO `cart_details`(`product_id`, `name`, `price`, `category`) VALUES ('$row[id]', '$row[name]','$row[price]','$row[category]')";
mysqli_query($conn, $query2);

header("location: ../shop/page.php? ID=".$row['id']."");
?>