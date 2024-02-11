<?php
include("./connection.php");
session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) {
    $loggedIn = false;
} else {
    $loggedIn = true;
}

$userId = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/cart.css">
    <title>Cart</title>
</head>

<body>
    <?php include("./navbar.php") ?>
    <div class="main">
        <h1>Cart.</h1>
        <center>
            <table>
                <thead>
                    <th>Product Id</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Delete</th>
                </thead>
                <?php
                $query = "SELECT * FROM `cart_details` WHERE user_id = '$userId'";
                $data = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_array($data)) {
                    echo "
                    <tr>
                        <td style='width: 16%;'>" . $row['product_id'] . "</td>
                        <td style='width: 16%;'>" . $row['name'] . "</td>
                        <td style='width: 16%;'>" . $row['category'] . "</td>
                        <td style='width: 16%;'>" . $row['price'] . "</td>
                        <td style='width: 16%;'><a href='./cartDelete.php? ID=" . $row['id'] . "' class='deleteBtn'>Delete</a></td>
                    </tr>
                    ";
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="2"><hr style="height: 3px; background-color: black;"></td>
                </tr>
                <tr>
                    <?php 
                    $sumQuery = "SELECT SUM(price) AS sum FROM cart_details WHERE user_id = '$userId'";
                    $total = mysqli_query($conn, $sumQuery);
                    $sum = mysqli_fetch_array($total);
                    ?>
                    <td colspan="2"> </td>
                    <th style='width: 16%;'>Total</th>
                    <td style='width: 16%;'><?php echo $sum['sum']?></td>
                    <td style='width: 16%;'><a href="#" class='checkoutBtn'>Checkout</a></td>
                </tr>
            </table>
        </center>
    </div>
    <?php include("./footer.php") ?>
    <script>
        console.log("<?php echo $_SESSION['qty']; ?>")
    </script>
</body>

</html>