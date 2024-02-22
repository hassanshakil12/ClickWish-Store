<?php
include("./connection.php");
session_start();

if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] != true) {
    $loggedIn = false;
    header("location: ../user/login.php");
} else {
    $loggedIn = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/profile.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Profile - <?php echo $_SESSION['username'] ?></title>
</head>

<body>
    <?php include("./navbar.php"); ?>
    <div class="main">
        <div class="top">
            <div class="coverPhoto">
                <img src="../Assets/cover.jpg" alt="Cover Photo">
            </div>
            <div class="profilePhoto">
                <img src="../Assets/profile.jpg" alt="Profile Photo">
            </div>
        </div>
        <div class="middle">
            <div class="top">
                <h1><?php echo $_SESSION['username'] ?> <i class="ri-verified-badge-fill"></i></h1>
            </div>
            <div class="center">
                <a href="#"><i class="ri-price-tag-3-line"></i>
                    <p>Items</p>
                </a>
                <a href="#"><i class="ri-message-2-line"></i>
                    <p>Messages</p>
                </a>
                <a href="#"><i class="ri-bar-chart-fill"></i>
                    <p>Orders</p>
                </a>
                <a href="#"><i class="ri-settings-line"></i>
                    <p>Settings</p>
                </a>
            </div>
        </div>
    </div>
</body>

</html>