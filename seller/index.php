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
            <h1>Welcome! <i>"<?php echo $_SESSION['username']?>"</i></h1>
        </div>
        <div class="middle">
            <div class="items">
                
            </div>
        </div>
        <div class="bottom">

        </div>
    </div>
</body>
</html>