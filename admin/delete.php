<?php
include("../user/connection.php");

$id = $_GET['ID'];

$query = "DELETE FROM `product_details` WHERE id = $id";
mysqli_query($conn, $query);
header("location: index.php");
?>