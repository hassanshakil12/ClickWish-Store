<?php include("./user/connection.php");
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
<link rel="stylesheet" href="navbar.css">

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
        <?php if ($loggedIn) {
            ?>

            <a href="./cart/index.php"><i class="ri-shopping-cart-line cart"></i></a>

            <?php
        } else {
            ?>

            <a href="./user/login.php"><i class="ri-shopping-cart-line cart"></i></a>

            <?php
        }
        ?>
        <i class="ri-menu-fill menuBtn"></i>



    </div>

    <?php
    if ($loggedIn == true) {
        ?>
        <div class="right">
            <h4>
                <?php echo $_SESSION["username"]; ?>
            </h4>
            <div class="pfp"><a href="./user/profile.php"><i class="ri-user-line"></i></a></div>
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

<div class="sideMenu" hidden>
    <div class="top">
        <p><a href="./index.php">Home</a></p>
        <p><a href="./shop/index.php">Shop</a></p>
        <p><a href="">Contact Us</a></p>
        <p><a href="">About Us</a></p>

        <?php if ($loggedIn == true) { ?>
            <p class="pfp"><a href="./user/profile.php"><?php echo $_SESSION["username"]; ?> <i class="ri-user-line"></i></a></p>
        <?php } ?>

    </div>
    <div class="bottom">
        <?php
        if ($loggedIn == true) {
            ?>

            <p class="logOutBtn"><a href="./user/logout.php">Sign Out</a></p>

            <?php
        } else {
            ?>

            <p class="logInBtn"><a href="./user/login.php">Log In</a></p>
            <p class="signUpBtn"><a href="./user/signup.php">Sign Up</a></p>

            <?php
        }
        ?>
    </div>
</div>

<script>
    const responsiveSideMenu = () => {
        let menuBtn = document.querySelector('.navbar .menuLogo .menuBtn');
        var sideMenu = document.querySelector('.sideMenu');
        let click = 0;

        menuBtn.addEventListener('click', function () {
            if (click == 0) {
                click--;
                sideMenu.style.display = 'block';
                sideMenu.style.opacity = 1;
                sideMenu.style.zIndex = 9;
            }
            else {
                click++;
                sideMenu.style.display = 'none';
                sideMenu.style.opacity = 0;
                sideMenu.style.zIndex = 0;
            }
        })
    }

    responsiveSideMenu();
</script>