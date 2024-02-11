<?php include("./connection.php"); ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@100;300;400;500;700;800;900&family=Red+Hat+Display:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<link rel="stylesheet" href="./css/navbar.css">

<div class="navbar">
    <div class="left">
        <h1>ClickWish</h1>
    </div>
    <div class="center">
        <p><a href="./index.php">Home</a></p>
        <p class="shopBtn"><a href="./product.php">Products</a></p>
        <p>Orders</p>
        <p>About Us</p>
    </div>
    <div class="menuLogo">
        <i class="ri-menu-fill menuBtn"></i>
    </div>

    <?php
    if ($loggedIn == true) {
        ?>
        <div class="right">
            <h4>
                <?php echo $_SESSION["username"]; ?>
            </h4>
            <div class="pfp"><a href="../user/profile.php"><i class="ri-user-line"></i></a></div>
            <div class="logOut"><a href="../user/logout.php"><i class="ri-shut-down-line" style="color: crimson;"></i></a>
            </div>
        </div>

        <?php
    } else {
        ?>
        <div class="right">
            <p class="logInBtn"><a href="../user/login.php">Log In</a></p>
            <p class="signUpBtn"><a href="../user/signup.php">Sign Up</a></p>
        </div>

        <?php
    }
    ?>

</div>

<div class="sideMenu">
    <div class="top">
        <p><a href="./index.php">Home</a></p>
        <p><a href="./product.php">Products</a></p>
        <p><a href="">Orders</a></p>
        <p><a href="">About Us</a></p>

        <?php if ($loggedIn == true) { ?>
            <p class="pfp"><a href="#">
                    <?php echo $_SESSION["username"]; ?> <i class="ri-user-line"></i>
                </a></p>
        <?php } ?>

    </div>
    <div class="bottom">
        <?php
        if ($loggedIn == true) {
            ?>

            <p class="logOutBtn"><a href="../user/logout.php">Sign Out</a></p>

            <?php
        } else {
            ?>

            <p class="logInBtn"><a href="../user/login.php">Log In</a></p>
            <p class="signUpBtn"><a href="../user/signup.php">Sign Up</a></p>

            <?php
        }
        ?>
    </div>
</div>

<script>
    let click = 0;
    let num = 0;
    const responsiveSideMenu = () => {
        let menuBtn = document.querySelector('.navbar .menuLogo .menuBtn');
        var sideMenu = document.querySelector('.sideMenu');
        let sideMenuShop = document.querySelector('.sideMenuShop');

        menuBtn.addEventListener('click', function () {
            if(num > 0){
                num = 0;
                sideMenuShop.style.zIndex = -1;
                sideMenuShop.style.opacity = 0;
            }
            else if (click == 0) {
                click=1;
                sideMenu.style.display = 'block';
                sideMenu.style.opacity = 1;
                sideMenu.style.zIndex = 9;
            }
            else {
                click=0;
                sideMenu.style.display = 'none';
                sideMenu.style.opacity = 0;
                sideMenu.style.zIndex = -1;
            }
        })
    }

    responsiveSideMenu();
</script>