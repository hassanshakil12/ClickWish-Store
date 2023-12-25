<?php include("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="userStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@100;300;400;500;700;800;900&family=Red+Hat+Display:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="main">
        <?php

        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = "SELECT * FROM user_data WHERE email = '$email' AND password = '$password';";
            $data = mysqli_query($conn, $query);

            if (mysqli_num_rows($data) > 0) {
                echo "<script>alert('login Successfull')</script>";
            } else {
                echo "<script>alert('login failed')</script>";
            }
        }
        ?>
        <form action="page.php" method="post">
            <h1>LOGIN</h1>
            <input type="email" class="textBox" name="email" placeholder="Enter Email" required>
            <input type="password" class="textBox" name="password" placeholder="Enter password" required>
            <p class="forgetPword"><a href="#">Forget Password</a></p>

            <input type="submit" class="btn" value="Log In" name="login">
            <p>Not Yet Registered? <a href="signup.php">Create Account</a></p>
        </form>
    </div>
</body>

</html>

