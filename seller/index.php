<?php
include("./connection.php");
session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) {
    $loggedIn = false;
    header('../user/login.php');
} else {
    $loggedIn = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Seller Dashboard</title>
</head>

<body>
    <?php include("./navbar.php"); ?>
    <div class="main">
        <div class="top">
            <h1>Welcome! <i>"<?php echo $_SESSION['username'] ?>"</i></h1>
        </div>
        <div class="middle">
            <div class="items">
                <center>
                    <table>
                        <thead>
                            <th>Image</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM product_details WHERE seller_id='$_SESSION[id]' ORDER BY id DESC LIMIT 2";
                            $data = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($data)) {
                            ?>
                                <tr>
                                    <td class="image"><img src="<?php echo $row['image'] ?>" alt="Image"></td>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['price'] ?></td>
                                    <td><?php echo $row['quantity'] ?></td>
                                    <td><?php echo $row['category'] ?></td>
                                    <td><a href="./update.php? ID=<?php echo $row['id'] ?>" class="updateBtn">Update</a></td>
                                    <td><a href="./delete.php? ID=<?php echo $row['id'] ?>" class="deleteBtn">Delete</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </center>
            </div>
        </div>
        <div class="bottom">

        </div>
    </div>
</body>

</html>