<?php 
include("./connection.php");
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
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Delete</th>
                </thead>
                <?php
                $query = "SELECT * FROM `cart_details` WHERE user_id = '$userId'";
                $data = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_array($data)) {
                    echo "
                    <tr>
                        <td style='width: 13.33%;'>".$row['product_id']."</td>
                        <td style='width: 13.33%;'>".$row['name']."</td>
                        <td style='width: 13.33%;'>".$_SESSION['qty']."</td>
                        <td style='width: 13.33%;'>".$row['price']."</td>
                        <td style='width: 13.33%;'>".$row['category']."</td>
                        <td style='width: 13.33%;'><a href='./cartDelete.php? ID=".$row['id']."' class='deleteBtn'>Delete</a></td>
                    </tr>
                    ";
                }
                ?>
            </table>
        </center>
    </div>
    <?php include("./footer.php") ?>
    <script>
        console.log("<?php echo $_SESSION['qty'];?>")
    </script>
</body>

</html>