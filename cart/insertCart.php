<?php
include("./connection.php");
$id = $_GET['ID'];

session_start();

if(!isset($_SESSION['$loggedIn']) || $_SESSION['$loggedIn'] != true){
    $loggedIn =  false;
}
else{
    $loggedIn = true;
}

$userId = $_SESSION["id"];

$query = "SELECT * FROM `product_details` WHERE id = $id";
$productData = mysqli_query($conn, $query);
$row = mysqli_fetch_array($productData);

$query2 = "INSERT INTO `cart_details`(`product_id`, `user_id`, `name`, `price`, `category`) VALUES ('$row[id]', '$userId', '$row[name]','$row[price]','$row[category]')";
mysqli_query($conn, $query2);

header("location: ../shop/page.php? ID=".$row['id']."");
?>