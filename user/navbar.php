<?php include("./connection.php");

session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) {
    $loggedIn = false;
} else {
    $loggedIn = true;
}

?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@100;300;400;500;700;800;900&family=Red+Hat+Display:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

<link rel="stylesheet" href="./css/navbar.css">
<div class="navbar">
    <div class="left">
        <h1>ClickWish</h1>
    </div>
    <div class="center">
        <p><a href="index.php">Home</a></p>
        <p class="shopBtn"><a href="./shop/index.php">Shop</a><!--<i class="ri-arrow-down-s-fill"></i>--></p>
        <p>Contact</p>
        <p>About Us</p>
    </div>
    <div class="menuLogo">
        <i class="ri-shopping-cart-line cart"></i>
        <i class="ri-menu-fill menu"></i>
    </div>
    <div class="searchField">
        <input type="text" class="search" placeholder="Search">
    </div>

    <?php
    if ($loggedIn == true) {
        ?>
        <div class="right">
            <h4>
                <?php echo $_SESSION["username"]; ?>
            </h4>
            <div class="pfp"><i class="ri-user-line"></i></div>
            <div class="pfp"><a href="./cart/index.php"><i class="ri-shopping-cart-line"></i></a></div>
            <div class="logOut"><a href="./user/logout.php"><i class="ri-shut-down-line" style="color: crimson;"></i></a>
            </div>
        </div>

        <?php
    } else {
        ?>
        <div class="right">
            <p class="logInBtn"><a href="./user/login.php">Log In</a></p>
            <p class="signUpBtn"><a href="./user/signup.php">Sign Up</a></p>
        </div>

        <?php
    }
    ?>

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

<!-- <div class="dropdown">
    <div class="category">
        <div class="section">
            <h4>Men Fashion</h4>
            <p>> T-Shirts</p>
            <p>> Trousers</p>
            <p>> Formal Shirts</p>
            <p>> Unstitched</p>
            <p>> Traditional</p>
            <p>> Footwear</p>
        </div>
        <div class="section">
            <h4>Women Fashion</h4>
            <p>> Kurti</p>
            <p>> Trousers</p>
            <p>> Unstitched</p>
            <p>> Pants</p>
            <p>> Traditional</p>
            <p>> Footwear</p>
        </div>
        <div class="section">
            <h4>Food & Beverages</h4>
            <p>> Vegetables</p>
            <p>> Meat</p>
            <p>> Spices & Lentils</p>
            <p>> Wheat Chakki</p>
            <p>> Soft Drinks</p>
            <p>> Appetizers</p>
        </div>
        <div class="section">
            <h4>Electronics & Accessories</h4>
            <p>> Mobile Accessories</p>
            <p>> Computer Accessories</p>
            <p>> Repairing Tools</p>
            <p>> Kitchen Electronics</p>
        </div>
        <div class="section">
            <h4>Furniture & Home Decor</h4>
            <p>> Living Room</p>
            <p>> Bed Room</p>
            <p>> Dinning Room</p>
            <p>> Lawn</p>
            <p>> Lights & Wall Art</p>
        </div>
    </div>
</div> -->