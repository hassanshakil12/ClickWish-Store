<?php
include('./connection.php');

session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) {
    $loggedIn = false;
} else {
    $loggedIn = true;
}

$id = $_GET['ID'];
$qty = 1;
$_SESSION['qty'] = $qty;


$query = "SELECT * FROM `product_details` WHERE id='$id'";
$data = mysqli_query($conn, $query);

$row = mysqli_fetch_array($data);

$sellerId = $row['seller_id'];

$sellerQuery = "SELECT * FROM `seller_data` WHERE id='$sellerId'";
$sellerData = mysqli_query($conn, $sellerQuery);
$sellerRow = mysqli_fetch_array($sellerData);
?>
<!-- <script>
    console.log("<?php echo $_SESSION['qty']; ?>");
</script> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/page.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Product Page</title>
</head>

<body>
    <?php include('./navbar.php'); ?>
    <div class="main">
        <div class="top">
            <div class="left">
                <div class="image">
                    <img src="../Assets/<?php echo $row['image'] ?>" alt="Product image">
                </div>
            </div>
            <div class="right">
                <h1>
                    <?php echo $row['name']; ?>
                </h1>
                <h2>Price:
                    <?php echo $row['price']; ?>Rs
                </h2>

                <div class="stock">
                    <div class="minus"><i class="ri-subtract-line"></i></div>
                    <div class="stockNumber">1</div>
                    <div class="plus"><i class="ri-add-line"></i></div>
                </div>

                <p class="warn warn1" hidden>Maximum in-Stock Quantity Reached!</p>
                <p class="warn warn2" hidden>Less than 1 is not possible!</p>
                <p class="warn warn3" hidden>Currently Out Of Stock!</p>

                <script>
                    let stock = document.querySelector(".stockNumber");
                    let plus = document.querySelector(".plus");
                    let minus = document.querySelector(".minus");
                    var number = 1;

                    if (<?php echo $row['quantity']; ?> <= 0) {
                        $(".warn3").show();
                    } else {
                        plus.addEventListener('click', function() {
                            if (number < <?php echo $row['quantity']; ?>) {
                                $(".warn2").hide();
                                number++;
                                stock.textContent = number;
                                <?php $qty = $qty + 1; ?>
                            } else {
                                $(".warn1").show();
                                setTimeout(function() {
                                    $(".warn1").hide();
                                }, 3000)
                            }
                        })

                        minus.addEventListener('click', function() {
                            if (number > 1) {
                                number--;
                                stock.textContent = number;
                                <?php $qty = $qty - 1; ?>
                                $(document).ready(function() {
                                    $(".warn1").hide();
                                })
                            } else {
                                $(".warn2").show();
                                setTimeout(function() {
                                    $(".warn2").hide();
                                }, 3000)
                            }
                        })
                    }
                </script>

                <div class="btn">
                    <?php if ($loggedIn) {
                    ?>
                        <input type="submit" value="Buy Now" class="buyBtn">
                        <a href="../cart/insertCart.php? ID='<?php echo $row['id'] ?>'"><input type="submit" value="Add To Cart" class="cartBtn"></a>
                    <?php
                    } else {
                    ?>
                        <a href="../user/login.php"><input type="submit" value="Buy Now" class="buyBtn"></a>
                        <a href="../user/login.php"><input type="submit" value="Add To Cart" class="cartBtn"></a>
                    <?php
                    } ?>
                </div>
                <div class="stars">
                    <i class="ri-star-fill star1"></i>
                    <i class="ri-star-fill star2"></i>
                    <i class="ri-star-fill star3"></i>
                    <i class="ri-star-fill star4"></i>
                    <i class="ri-star-fill star5"></i>
                    <i class="feedback">()</i>
                </div>
                <p class="warn warn4" hidden>Feedback Already submitted!!</p>

                <?php
                if ($loggedIn == false) {
                ?>

                    <script>
                        const starArray = [
                            document.querySelector('.star1'),
                            document.querySelector('.star2'),
                            document.querySelector('.star3'),
                            document.querySelector('.star4'),
                            document.querySelector('.star5')
                        ];

                        // if user click on the stars w/t login this will redirect him to login page...
                        starArray.forEach(star => {
                            star.addEventListener('click', function() {
                                window.location.href = '../user/login.php';
                            })
                        });
                    </script>

                <?php
                } else if ($loggedIn == true) {
                ?>

                    <script>
                        let feedbackNum = 0;
                        let feedback = document.querySelector('.feedback');

                        let rating = 0;
                        starArray = [
                            document.querySelector('.star1'),
                            document.querySelector('.star2'),
                            document.querySelector('.star3'),
                            document.querySelector('.star4'),
                            document.querySelector('.star5')
                        ];

                        // recording the rating according to stars and assigning values to them...
                        for (let i = 0; i < starArray.length; i++) {
                            starArray[i].addEventListener('click', function() {
                                if (rating == 0) {
                                    rating = i + 1;
                                    feedbackNum++;
                                    console.log(rating)
                                    feedback.textContent = '( ' + feedbackNum + ' )';

                                    // changing the colors of assigned rating...
                                    for (let i = 0; i < rating; i++) {
                                        starArray[i].style.color = "yellow"
                                    }
                                } else {
                                    $('.warn4').show();
                                    setTimeout(() => {
                                        $('.warn4').hide();
                                    }, 3000);
                                }
                            });
                        }
                    </script>

                <?php
                }
                ?>
                <div class="sellerInfo">
                    <h4>Product by:</h4>
                    <div class="profile">
                        <div class="avatar">
                            <i class="ri-user-fill"></i>
                        </div>
                        <h4><?php echo $sellerRow['username'] ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="description">
                <h4>Description.</h4>
                <p><?php echo $row['description'] ?></p>
            </div>
            <div class="buyerFeedback">
                <h4>Comments.</h4>
                <div class="comments">
                    <?php
                    $cmtDisplayQuery = "SELECT * FROM comment_details WHERE product_id = '$id'";
                    $cmtDisplayData = mysqli_query($conn, $cmtDisplayQuery);

                    while ($cmtRow = mysqli_fetch_array($cmtDisplayData)) {
                        $nameQuery = "SELECT * FROM user_data WHERE id = '$cmtRow[user_id]'";
                        $nameData = mysqli_query($conn, $nameQuery);
                        $nameRow = mysqli_fetch_array($nameData);
                    ?>
                        <div class="comment">
                            <h6><?php echo $nameRow['username'] ?></h6>
                            <p><?php echo $cmtRow['comment'] ?></p>
                        </div>
                    <?php
                    }
                    if(isset($_POST["commentBtn"])) {
                        if($loggedIn) {
                            $comment = $_POST["comment"];
                            
                            $cmtQuery = "SELECT * FROM comment_details WHERE user_id='$_SESSION[id]' AND product_id='$id'";
                            $cmtData = mysqli_query($conn, $cmtQuery);
                            if(mysqli_num_rows($cmtData) == 0) {
                                $cmtQuery = "INSERT INTO `comment_details`(`user_id`, `product_id`, `comment`) VALUES ('$_SESSION[id]','$id','$comment')";
                                $cmtData = mysqli_query($conn, $cmtQuery);
                            }
                        }
                    }
                    ?>

                    <form method="POST">
                        <input type="text" name="comment" class="userCmt" placeholder="Add a Comment">
                        <input type="submit" value="Send" class="cmtBtn" name="commentBtn">
                    </form>
                </div>
            </div>
            <div class="latestProducts">
                <h4>Latest Products.</h4>
                <div class='container'>
                    <?php
                    $query = "SELECT * FROM `product_details` ORDER BY RAND() LIMIT 5";
                    $data = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($data)) {
                    ?>
                        <a href="./page.php? ID=<?php echo "$row[id]" ?>">
                            <div class="product">
                                <div class="top2">
                                    <img src="<?php echo $row['image'] ?>">
                                </div>
                                <div class="bottom2">
                                    <h1><?php echo "$row[name]" ?></h1>
                                    <div class="bottomBottom2">
                                        <p><?php echo "$row[price]" ?>Rs</p>
                                        <div class="right">
                                            <?php if ($loggedIn) { ?>
                                                <a href="../cart/insertCart.php? ID=<?php echo "$row[id]" ?>" class="right"><i class="ri-shopping-cart-line"></i></a>
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
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php include('./footer.php'); ?>
</body>

</html>