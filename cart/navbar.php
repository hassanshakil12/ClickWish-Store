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
        <p><a href="../index.php">Home</a></p>
        <p class="shopBtn"><a href="../shop/index.php">Shop<i class="ri-arrow-down-s-fill"></i></a></p>
        <p>Contact</p>
        <p>About Us</p>
    </div>
    <div class="menuLogo">
        <?php if ($loggedIn) {
        ?>

            <a href="./index.php"><i class="ri-shopping-cart-line cart"></i></a>

        <?php
        } else {
        ?>

            <a href="../user/login.php"><i class="ri-shopping-cart-line cart"></i></a>

        <?php
        }
        ?>
        <i class="ri-menu-fill menuBtn"></i>

    </div>
    <div class="right">
        <?php
        $userId = $_SESSION['id'];
        $itemCountQuery = "SELECT COUNT(id) AS count FROM cart_details WHERE user_id = '$userId'";
        $itemCountData = mysqli_query($conn, $itemCountQuery);

        $count = mysqli_fetch_array($itemCountData);
        if ($loggedIn) {
        ?>
            <h4><?php echo $_SESSION["username"]; ?></h4>
            <div class="pfp"><a href="../user/profile.php"><i class="ri-user-line"></i></a></div>
            <div class="cartBtn">
                <?php
                if ($count['count'] > 0) {
                ?>
                    <div class="add">
                        <h2><?php if ($count['count'] > 9) {
                                echo '9+';
                            } else {
                                echo $count['count'];
                            }
                            ?></h2>
                    </div>
                <?php
                }
                ?>
                <a href="./index.php">
                    <i class="ri-shopping-cart-line"></i>
                </a>
            </div>
            <div class="logOut"><a href="../user/logout.php"><i class="ri-shut-down-line" style="color: crimson;"></i></a></div>
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

<div class="dropdown">
    <section>
        <h4><a href="../shop/fashion.php">Fashion & Clothing</a></h4>
        <a href="../shop/fashion.php">Men Wear</a>
        <a href="../shop/fashion.php">Women Wear</a>
        <a href="../shop/fashion.php">Kids Wear</a>
        <a href="../shop/fashion.php">Footwear</a>
        <a href="../shop/fashion.php">Casual Wear</a>
    </section>
    <section>
        <h4><a href="../shop/electronics.php">Electronics & Appliances</a></h4>
        <a href="../shop/electronics.php">LED & Television</a>
        <a href="../shop/electronics.php">Refrigerators</a>
        <a href="../shop/electronics.php">Air Conditioners</a>
        <a href="../shop/electronics.php">Kitchen Appliances</a>
    </section>
    <section>
        <h4><a href="../shop/devices.php">Phones & Laptops</a></h4>
        <a href="../shop/devices.php">Android Phones</a>
        <a href="../shop/devices.php">Apple phones</a>
        <a href="../shop/devices.php">Apple Macbooks</a>
        <a href="../shop/devices.php">Windows Laptops</a>
        <a href="../shop/devices.php">Laptop Accessories </a>
    </section>
    <section>
        <h4><a href="../shop/food.php">Food & Beverages</a></h4>
        <a href="../shop/food.php">Cold Drinks</a>
        <a href="../shop/food.php">Meat</a>
        <a href="../shop/food.php">Wheat</a>
        <a href="../shop/food.php">Dairy Products</a>
    </section>
    <section>
        <h4><a href="../shop/sports.php">Sports & Fitness</a></h4>
        <a href="../shop/sports.php">Cricket</a>
        <a href="../shop/sports.php">Football</a>
        <a href="../shop/sports.php">Table Tennis</a>
        <a href="../shop/sports.php">Basket Ball</a>
        <a href="../shop/sports.php">Indoor Games</a>
        <a href="../shop/sports.php">Gym Equipment</a>
    </section>
    <section>
        <h4><a href="../shop/home.php">Home & Decor</a></h4>
        <a href="../shop/home.php">Furniture</a>
        <a href="../shop/home.php">Carpets</a>
        <a href="../shop/home.php">Lights</a>
        <a href="../shop/home.php">Wall Decor</a>
        <a href="../shop/home.php">Plants</a>
    </section>
    <section>
        <h4><a href="../shop/entertainment.php">Gaming & Entertainment</a></h4>
        <a href="../shop/entertainment.php">Playstation 5</a>
        <a href="../shop/entertainment.php">Xbox One</a>
        <a href="../shop/entertainment.php">Gaming Controllers</a>
        <a href="../shop/entertainment.php">Blu-ray Disks</a>
        <a href="../shop/entertainment.php">Gaming PC</a>
        <a href="../shop/entertainment.php">Computer Accessories</a>
    </section>
    <section>
        <h4><a href="../shop/stationary.php">Books & Stationary</a></h4>
        <a href="../shop/stationary.php">Novels</a>
        <a href="../shop/stationary.php">Motivational Books</a>
        <a href="../shop/stationary.php">Painting</a>
        <a href="../shop/stationary.php">Pen & Pencils</a>
        <a href="../shop/stationary.php">School Books</a>
    </section>
</div>

<script>
    let shopBtn = document.querySelector('.navbar .shopBtn');
    let dropdown = document.querySelector('.dropdown');
    let count = 0;

    shopBtn.addEventListener('mouseover', function() {
        if (count == 0) {
            count++;
            dropdown.style.zIndex = 9;
            dropdown.style.opacity = 1;
        }
    })

    dropdown.addEventListener('mouseleave', function() {
        if (count > 0) {
            count = 0;
            dropdown.style.zIndex = -1;
            dropdown.style.opacity = 0;
        }
    })
</script>

<div class="sideMenu">
    <div class="top">
        <p><a href="../index.php">Home</a></p>
        <p class="sideMenuShopBtn"><a href="#">Shop<i class="ri-arrow-down-s-fill"></i></a></p>
        <p><a href="">Contact Us</a></p>
        <p><a href="">About Us</a></p>

        <?php if ($loggedIn == true) { ?>
            <p class="pfp"><a href="../user/profile.php">
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

<div class="sideMenuShop">
    <i class="ri-arrow-left-line close"></i>
    <a href="../shop/fashion.php">Fashion & Clothing</a>
    <a href="../shop/electronics.php">Electronics & Appliances</a>
    <a href="../shop/devices.php">Phones & Laptops</a>
    <a href="../shop/food.php">Food & Beverages</a>
    <a href="../shop/sports.php">Sports & Fitness</a>
    <a href="../shop/home.php">Home & Decor</a>
    <a href="../shop/entertainment.php">Gaming & Entertainment</a>
    <a href="../shop/stationary.php">Books & Stationary</a>
</div>

<script>
    let click = 0;
    let num = 0;
    const responsiveSideMenu = () => {
        let menuBtn = document.querySelector('.navbar .menuLogo .menuBtn');
        var sideMenu = document.querySelector('.sideMenu');
        let sideMenuShop = document.querySelector('.sideMenuShop');

        menuBtn.addEventListener('click', function() {
            if (num > 0) {
                num = 0;
                sideMenuShop.style.zIndex = -1;
                sideMenuShop.style.opacity = 0;
            } else if (click == 0) {
                click = 1;
                sideMenu.style.display = 'block';
                sideMenu.style.opacity = 1;
                sideMenu.style.zIndex = 9;
            } else {
                click = 0;
                sideMenu.style.display = 'none';
                sideMenu.style.opacity = 0;
                sideMenu.style.zIndex = -1;
            }
        })
    }

    const sideMenuShop = () => {
        let sideMenuShopBtn = document.querySelector('.sideMenuShopBtn');
        let sideMenuShop = document.querySelector('.sideMenuShop');
        let sideMenu = document.querySelector('.sideMenu')
        let close = document.querySelector('.close')

        sideMenuShopBtn.addEventListener('click', function() {
            if (num == 0) {
                num = 1;
                click = 0;
                console.log('hello');
                sideMenuShop.style.zIndex = 9;
                sideMenuShop.style.opacity = 1;
                sideMenu.style.zIndex = -1;
                sideMenu.style.opacity = 0;
            }
        })

        close.addEventListener('click', function() {
            if (num > 0) {
                num = 0;
                click = 1;
                sideMenuShop.style.zIndex = -1;
                sideMenuShop.style.opacity = 0;
                sideMenu.style.zIndex = 9;
                sideMenu.style.opacity = 1;
            }
        })
    }

    sideMenuShop();
    responsiveSideMenu();
</script>