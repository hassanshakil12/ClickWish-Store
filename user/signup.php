<?php include("connection.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/signup.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@100;300;400;500;700;800;900&family=Red+Hat+Display:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main">
        <form action="" method="post">
            <h1>SIGNUP</h1>
            <input type="text" name="username" placeholder="Enter Username" required>
            <input type="email" name="email" placeholder="Enter Email" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
            <div class="gndr">
                <div class="male">
                    <input type="radio" name="gender" value="Male">
                    <p>Male</p>
                </div>
                <div class="female">
                    <input type="radio" name="gender" value="Female">
                    <p>Female</p>
                </div>
            </div>
            
            <select name="accountType">
                <option selected>--Select Account Type--</option>
                <option value="Buyer" name="accountType">Buyer</option>
                <option value="Seller" name="accountType">Seller</option>
            </select>

            <div class="terms">
                <input type="checkbox" required>
                <p>Accept all terms & conditions</p>
            </div>
            
            <input type="submit" value="Register" class="btn" name="register"?>>
            <p>Already Have account? <a href="login.php">Login here</a></p>
        </form>
    </div>
</body>
</html>

<?php 
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if($password == $confirmPassword){
        $gender = $_POST['gender'];
        $accountType = $_POST['accountType'];

        $query = "SELECT * FROM user_data WHERE username = '$username' OR email = '$email'";
        $data = mysqli_query($conn, $query);

        if (mysqli_num_rows($data) > 0){
            echo "<script>alert('User Already Exists')</script>";
        } else {
            $query = "INSERT INTO `user_data`(`username`, `email`, `password`, `gender`, `accountType`) VALUES ('$username','$email','$password','$gender','$accountType')";
            $data = mysqli_query($conn, $query);

            if($data){
                echo '
                <div class="Success">
                    <p><strong>Congratulations! </strong>Your Account has been created successfully with username: ' . $username . '.</p>
                </div>';
                header("location: ./login.php");
            } else{
                echo '
                <div class="error">
                    <p><strong>Error! </strong>There occurs an error while creating you account.</p>
                </div>';
            }
        }
    } else{
        echo '
        <div class="warning">
            <p><strong>Warning! </strong>Passwords didn\'t matched.</p>
        </div>';
    }
}
?>