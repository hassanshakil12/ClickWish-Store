<?php
include("../user/connection.php");
session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) {
    header('location: ../user/login.php');
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
    <link
        href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@100;300;400;500;700;800;900&family=Red+Hat+Display:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./style/index.css">
    <title>Admin Panel</title>
</head>

<body>
    <?php include("navbar.php") ?>
    <div class="main">
        <center>
            <h1>Welcome To Admin Panel</h1>
        </center>
        <div class="middle">
            <p><a href="./product.php">Add Products</a></p>
            <p><a href="./users.php">Users Information</a></p>
            <p><a href="./accounts.php">Accounts & Payments</a></p>
        </div>
        <center>
            <table>
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Update</th>
                    <th>Delete</th>
                </thead>
                <?php
                $query = "SELECT * FROM `product_details`";
                $data = mysqli_query($conn, $query);

                while($row = mysqli_fetch_array($data)){
                    echo"
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[price]</td>
                        <td>$row[quantity]</td>
                        <td>$row[category]</td>
                        <td><a href='update.php? ID=$row[id]' class='updateBtn'>Update</a></td>
                        <td><a href='#' class='deleteBtn'>Delete</a></td>
                    </tr>
                    ";
                }
                ?>
            </table>
        </center>
    </div>
</body>

</html>