<?php include("./connection.php"); ?>

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
        <center>
            <h1>Cart</h1>
        </center>

        <center>
            <table>
                <thead>
                    <th>Sr No</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Delete</th>
                </thead>
                <?php
                $query = "SELECT * FROM `cart_details`";
                $data = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_array($data)) {
                    echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[price]</td>
                        <td>$row[category]</td>
                        <td><a href='./cartDelete.php? ID=$row[id]' class='deleteBtn'>Delete</a></td>
                    </tr>
                    ";
                }
                ?>
            </table>
        </center>
    </div>
    <?php include("./footer.php") ?>
</body>

</html>