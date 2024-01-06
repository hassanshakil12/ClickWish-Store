<?php include("./user/connection.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="shop.css">
    <title>Shop</title>
</head>

<body>
    <?php include("navbar.php") ?>
    <div class="main">
        <div class='container'>
            <?php
            $query = "SELECT * FROM `product_details`";
            $data = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($data)) {
                echo "
            <div class='product'>
                <div class='top'>

                </div>
                <div class='bottom'>
                    <h1>$row[name]</h1>
                    <div class='bottomBottom'>
                        <p>$row[price] Rs</p>
                        <div class='right'>
                            <a href='#' class='right'><i class='ri-shopping-cart-line'></i></a>
                            <a href='#'><i class='ri-heart-line'></i></a>
                        </div>
                    </div>
                </div>
            </div>
            ";
            }
            ?>
        </div>
    </div>
    <?php include("footer.php") ?>
</body>

</html>