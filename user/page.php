<?php
session_start();

if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true){
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - <?php echo $_SESSION['email']; ?></title>
</head>
<body style="background-color: red;">
    <h1>Welcome <?php echo $_SESSION["username"]; ?></h1>
    <h1>Gender = <?php echo $_SESSION["gender"]; ?></h1>
    <h1>User ID = <?php echo $_SESSION["id"]; ?></h1>
</body>
</html>