<?php
include("./connection.php");

if (isset($_POST["changeBtn"])) {
    $email = $_POST['email'];
    $phoneNo = $_POST['phoneNo'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $query = "SELECT * FROM user_data WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        if ($password == $confirmPassword) {
            $updateQuery = "UPDATE user_data SET password = '$password' WHERE email = '$email'";
            mysqli_query($conn, $updateQuery);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/forgetpassword.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@100;300;400;500;700;800;900&family=Red+Hat+Display:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <title>Forget Password</title>
</head>
<body>
    <div class="main">
        <form method="post">
            <h1>Forget Password</h1>
            <input type="email" name="email" placeholder="Enter Email" required>
            <input type="tel" name="phoneNo" placeholder="Enter Phone No." required>
            <input type="passsword" name="password" placeholder="Enter Password" required>
            <input type="passsword" name="confirmPassword" placeholder="Confirm Password" required>
            <input type="submit" value="Change Password" name="changeBtn" class="btn">
        </form>
    </div>
</body>
</html>