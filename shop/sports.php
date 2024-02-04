<?php include("./connection.php"); 
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
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/shop.css">
    <title>Sports & Fitness</title>
</head>
<body>
    <?php include("./navbar.php") ?>
    <div class="main">
        <h1>Sports & Fitness.</h1>
        <div class='container'>
            <?php
            $query = "SELECT * FROM `product_details` ORDER BY name ASC";
            $data = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($data)) {
                $pageCategory = $row['category'];
                if ($pageCategory == "Sports") {
            ?>
                    <a href="./page.php? ID=<?php echo "$row[id]" ?>">
                    <div class="product">
                        <div class="top"></div>
                        <div class="bottom">
                            <h1><?php echo "$row[name]" ?></h1>
                            <div class="bottomBottom">
                                <p><?php echo "$row[price]" ?>Rs</p>
                                <div class="right">
                                    <?php 
                                    if ($loggedIn) { 
                                    ?>
                                        <a href="../cart/insertCart.php? ID=<?php echo "$row[id]" ?>" class="right"><i class="ri-shopping-cart-line"></i></a>
                                    <?php 
                                    } 
                                    else { 
                                    ?>
                                        <a href="../user/login.php" class="right"><i class="ri-shopping-cart-line"></i></a>
                                    <?php 
                                    } 
                                    ?>
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