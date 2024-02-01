<?php include("./connection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@100;300;400;500;700;800;900&family=Red+Hat+Display:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="main">
        <?php
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($email == "admin@admin.com" && $password == "admin") {
                session_start();

                $_SESSION["username"] = "Admin";
                $_SESSION["loggedIn"] = true;
                header("location: ../admin/index.php");
            } else {
                $query = "SELECT * FROM user_data WHERE email = '$email' AND password = '$password'";
                $data = mysqli_query($conn, $query);

                if (mysqli_num_rows($data) > 0) {
                    // echo "<script>alert('login Successfull :)')</script>";

                    $result = mysqli_fetch_assoc($data);
                    $username = $result["username"];
                    $gender = $result["gender"];
                    $userId = $result["id"];

                    session_start();

                    $_SESSION["loggedIn"] = true;
                    $_SESSION["email"] = $email;
                    $_SESSION["username"] = $username;
                    $_SESSION["gender"] = $gender;
                    $_SESSION["id"] = $userId;

                    header("location: ../index.php");
                } 
                else {
                    ?>
                    <div class="error">
                        <p><strong>Error! </strong>Login Failed due to incorrect user name or password.</p>
                    </div>
                    <script>
                        $(".error").show();
                        setTimeout(function() {
                            $(".error").fadeOut();
                        }, 5000);
                    </script>
                    <?php
                }
            }
        }
        ?>

        <form action="" method="post">
            <h1>LOGIN</h1>
            <input type="email" class="textBox" name="email" placeholder="Enter Email" required>
            <input type="password" class="textBox" name="password" placeholder="Enter password" required>
            <p class="forgetPword"><a href="./forgetpassword.php">Forget Password</a></p>

            <input type="submit" class="btn" value="Log In" name="login">
            <p>Not Yet Registered? <a href="signup.php">Create Account</a></p>
        </form>
    </div>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>