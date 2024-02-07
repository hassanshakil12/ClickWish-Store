<?php 
include("./connection.php");
session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) {
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
    <link rel="stylesheet" href="./css/index.css">
    <title>Seller Dashboard</title>
</head>
<body>
    <?php include("./navbar.php");?>
    <div class="main">
        <h1>Welcome! </h1>
    </div>
</body>
</html>