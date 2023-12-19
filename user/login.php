<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="userStyle.css">
</head>

<body>
    <div class="main">
        <form action="" method="post">
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

<?php
include("connection.php");

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user_data WHERE email = '$email' AND password = '$password';";
    $data = mysqli_query($conn, $query);

    if(mysqli_num_rows($data) > 0){ 
        echo "<script>alert('login Successfull')</script>";
    } else{
        echo "<script>alert('login failed')</script>";
    }
}
?>