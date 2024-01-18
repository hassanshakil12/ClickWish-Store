<?php
include("./connection.php");

$id = $_GET['ID'];

$query = "DELETE FROM `cart_details` WHERE id = $id";
mysqli_query($conn, $query);
header("location: ./cart/index.php");
?>