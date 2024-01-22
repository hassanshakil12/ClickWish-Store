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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                <!-- <input type="range"> -->

                <div class="stock">
                    <div class="minus"><i class="ri-subtract-line"></i></div>
                    <div class="stockNumber">1</div>
                    <div class="plus"><i class="ri-add-line"></i></div>
                </div>
                <p class="warn" hidden>Out Of Stock</p>

                <script>
                    let stock = document.querySelector(".stockNumber");
                    let plus = document.querySelector(".plus");
                    let minus = document.querySelector(".minus");
                    var num = 1;

                    plus.addEventListener('click', function () {
                        if (num < <?php echo $row['quantity']; ?>) {
                            num++;
                            stock.textContent = num;
                        }

                        else {
                            // jQuery Part
                                $(document).ready(function () {
                                    $(".warn").show();
                                })
                            // alert('Something went wrong!')
                        }
                    })

                    minus.addEventListener('click', function () {
                        if (num > 1) {
                            num--;
                            stock.textContent = num;
                            $(document).ready(function () {
                                $(".warn").hide();
                            })
                        } else {
                            console.log('Invalid Operation')
                        }
                    })
                </script>

                <div class="btn">
                    <input type="submit" value="Buy Now" class="buyBtn">
                    <input type="submit" value="Add To Cart" class="cartBtn">
                </div>
            </div>
        </div>
        <div class="bottom"></div>
    </div>
    <?php include('./footer.php'); ?>
</body>

</html>