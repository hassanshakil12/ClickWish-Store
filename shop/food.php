<?php include("./connection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/shop.css">
    <title>Food & Beverages</title>
</head>

<body>
    <?php include("./navbar.php") ?>
    <div class="main">
        <div class="category">
            <h4><a href="./fashion.php">Fashion & Clothing</a></h4>
            <h4><a href="./electronics.php">Electronics & Appliances</a></h4>
            <h4><a href="./devices.php">Phones & Laptops</a></h4>
            <h4><a href="./food.php">Food & Beverages</a></h4>
            <h4><a href="./sports.php">Sports & Fitness</a></h4>
            <h4><a href="./home.php">Home & Decor</a></h4>
            <h4><a href="./entertainment.php">Gaming & Entertainment</a></h4>
            <h4><a href="./stationary.php">Books & Stationary</a></h4>
        </div>
        <div class='container'>
            <?php
            $query = "SELECT * FROM `product_details`";
            $data = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($data)) {
                $pageCategory = $row['category'];
                if ($pageCategory == "Food") {
                    ?>

                    <a href="./page.php? ID=<?php echo md5(uniqid("$row[id]")) ?>">

                        <div class="product">
                            <div class="top">
                            </div>
                            <div class="bottom">
                                <h1>
                                    <?php echo "$row[name]" ?>
                                </h1>
                                <div class="bottomBottom">
                                    <p>
                                        <?php echo "$row[price]" ?>Rs
                                    </p>
                                    <div class="right">

                                        <?php if ($loggedIn) { ?>
                                            <a href="../cart/insertCart.php? ID=<?php echo "$row[id]" ?>" class="right"><i
                                                    class="ri-shopping-cart-line"></i></a>
                                        <?php } else { ?>
                                            <a href="../user/login.php" class="right"><i class="ri-shopping-cart-line"></i></a>
                                        <?php } ?>

                                        <a href="#"><i class="ri-heart-line"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <?php include("./footer.php") ?>
</body>

</html>