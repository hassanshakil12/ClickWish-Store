<?php
include('./connection.php');

$id = $_GET['ID'];

$query = "SELECT * FROM `product_details` WHERE id='$id'";
$data = mysqli_query($conn, $query);

$row = mysqli_fetch_array($data);
?>
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
                    <img src="../Assets/Sample.jpg" alt="Product image">
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
                    }
                    else {
                        plus.addEventListener('click', function () {
                            if (number < <?php echo $row['quantity']; ?>) {
                                $(".warn2").hide();
                                number++;
                                stock.textContent = number;

                            }
                            else {
                                $(".warn1").show();
                                setTimeout(function () {
                                    $(".warn1").hide();
                                }, 3000)
                            }
                        })

                        minus.addEventListener('click', function () {
                            if (number > 1) {
                                number--;
                                stock.textContent = number;
                                $(document).ready(function () {
                                    $(".warn1").hide();
                                })
                            }
                            else {
                                $(".warn2").show();
                                setTimeout(function () {
                                    $(".warn2").hide();
                                }, 3000)
                            }
                        })
                    }
                </script>

                <div class="btn">
                    <input type="submit" value="Buy Now" class="buyBtn">
                    <input type="submit" value="Add To Cart" class="cartBtn">
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
                        let starNum = 0;
                        const starArray = [
                            document.querySelector('.star1'),
                            document.querySelector('.star2'),
                            document.querySelector('.star3'),
                            document.querySelector('.star4'),
                            document.querySelector('.star5')
                        ];

                        starArray.forEach(star => {
                            star.addEventListener('click', function () {
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

                            starNum = 0;
                            starArray = [
                                document.querySelector('.star1'),
                                document.querySelector('.star2'),
                                document.querySelector('.star3'),
                                document.querySelector('.star4'),
                                document.querySelector('.star5')
                            ];

                            for (let i = 0; i < starArray.length; i++) {
                                starArray[i].addEventListener('click', function () {
                                    if (starNum == 0) {
                                        starNum = i + 1;
                                        feedbackNum++;
                                        console.log(starNum);
                                        feedback.textContent = '( ' + feedbackNum + ' )';
                                    }
                                    else {
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

            </div>
        </div>
        <div class="bottom">
            <div class="description">
                <h4>Description.</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Cupiditate, itaque! A est, amet autem fugiat ab asperiores
                    esse nisi. Eum, corporis ipsam nobis rem minima asperiores
                    aspernatur ex, ea provident sequi consectetur repellendus
                    reprehenderit voluptatem exercitationem quo. Beatae, minima
                    dolores? Tempora minus quas ipsum cumque velit amet sunt
                    reiciendis non! Lorem ipsum dolor sit amet, consectetur.
                    Cupiditate, itaque! A est, amet autem fugiat ab asperiores
                    esse nisi. Eum, corporis ipsam nobis rem minima asperiores
                    aspernatur ex, ea provident sequi consectetur repellendus
                    reprehenderit voluptatem exercitationem quo. Beatae, minima
                    dolores? Tempora minus quas ipsum cumque velit amet sunt
                    reiciendis non! Eum, corporis ipsam nobis rem minima asperiores
                    aspernatur ex, ea provident sequi consectetur repellendus
                    reprehenderit voluptatem exercitationem quo. Beatae, minima
                    dolores? Tempora minus quas ipsum cumque velit amet sunt
                    reiciendis non!</p>
            </div>
            <div class="buyerFeedback">
                <h4>Comments.</h4>
                <div class="comments">
                    <div class="comment">
                        <h6>hassanshakil12: </h6>
                        <p>It's a Very good product with fast and quick delivery time...</p>
                    </div>
                    <div class="comment">
                        <h6>shayanYarKhan22: </h6>
                        <p>Best product and proce is also good as compare to other stores.</p>
                    </div>
                    <div class="comment">
                        <h6>hassanshakil12: </h6>
                        <p>It's a Very good product with fast and quick delivery time...</p>
                    </div>
                    <div class="comment">
                        <h6>shayanYarKhan22: </h6>
                        <p>Best product and proce is also good as compare to other stores.</p>
                    </div>
                    <div class="comment">
                        <h6>hassanshakil12: </h6>
                        <p>It's a Very good product with fast and quick delivery time...</p>
                    </div>
                    <div class="comment">
                        <h6>shayanYarKhan22: </h6>
                        <p>Best product and proce is also good as compare to other stores.</p>
                    </div>

                    <form method="post">
                        <input type="text" name="comment" class="userCmt" placeholder="Add a Comment">
                        <input type="submit" value="Send" class="cmtBtn" name="commentBtn">
                    </form>
                </div>
            </div>
            <div class="productSection">
                <h4>Latest Products.</h4>
                <div class='container'>
                    <?php
                    $query = "SELECT * FROM `product_details` ORDER BY RAND() LIMIT 5";
                    $data = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($data)) {
                    ?>
                    <a href="./page.php? ID=<?php echo "$row[id]" ?>">
                    <div class="product">
                        <div class="top"></div>
                        <div class="bottom">
                            <h1><?php echo "$row[name]" ?></h1>
                            <div class="bottomBottom">
                                <p><?php echo "$row[price]" ?>Rs</p>
                                <div class="right">
                                    <?php if ($loggedIn) {?>
                                        <a href="../cart/insertCart.php? ID=<?php echo "$row[id]" ?>" class="right"><i class="ri-shopping-cart-line"></i></a>
                                    <?php } 
                                    else { ?>
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