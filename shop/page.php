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
    <title>Product Page</title>
</head>
<body>
    <?php include('./navbar.php');?>
    <div class="main">
        <h1><?php echo $row['name']; ?></h1>
    </div>
    <?php include('./footer.php'); ?>
</body>
</html>