<?php
include("./connection.php");
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
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@100;300;400;500;700;800;900&family=Red+Hat+Display:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Forget Password</title>
</head>

<body>
    <div class="main">
        <form method="post">
            <h1>Forget Password</h1>
            <input type="email" name="email" placeholder="Enter Email" required>
            <input type="tel" name="phoneNo" placeholder="Enter Phone No." required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
            <input type="submit" value="Change Password" name="changeBtn" class="btn">
        </form>
    </div>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>
<?php
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
            header("location: login.php");
        } else {
?>
            <div class="error">
                <p><strong>Error! </strong>Passwords didn't matched.</p>
            </div>
            <script>
                $(".error").show();
                setTimeout(function() {
                    $(".error").fadeOut();
                }, 5000);
            </script>
        <?php
        }
    } else {
        ?>
        <div class="error">
            <p><strong>Error! </strong>"<?php echo $email ?>" email didn't exist. Please enter valid email address.</p>
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
?>