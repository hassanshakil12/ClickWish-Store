<?php 
include("../user/connection.php");

session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) {
    $loggedIn = false;
} else {
    $loggedIn = true;
}

?>

<link rel="stylesheet" href="./style/navbar.css">
<div class="navbar">
    <div class="left">
        <h1>Logo</h1>
    </div>
    <div class="center">
        <p><a href="./index.php">Dashboard</a></p>
        <p><a href="./product.php">Products</a></p>
        <p><a href="./users.php">Users</a></p>
        <p><a href="./accounts.php">Account</a></p>
    </div>

    <!-- <?php if ($loggedIn == true) { ?> -->
        <div class="right">
            <h4>
                <?php echo $_SESSION["username"]; ?>
            </h4>
            <div class="pfp"><i class="ri-user-line"></i></div>
            <div class="logOut"><a href="../user/logout.php"><i class="ri-shut-down-line" style="color: crimson;"></i></a>
            </div>
        </div>

    <!-- <?php } ?> -->

</div>

<div class="sideMenu">
    <p>Home</p>
    <p class="sideBarShopBtn">Shop<i class="ri-arrow-down-s-fill"></i></p>
    <div class="shopMenu">
        <p>Men Fashion<i class="ri-arrow-down-s-fill"></i></p>
        <p>Women Fashion<i class="ri-arrow-down-s-fill"></i></p>
        <p>Food & Beverages<i class="ri-arrow-down-s-fill"></i></p>
        <p>Electronics & Accessories<i class="ri-arrow-down-s-fill"></i></p>
        <p>Furniture & Home Decor<i class="ri-arrow-down-s-fill"></i></p>
    </div>
    <p>Contact Us</p>
    <p>About Us</p>
</div>