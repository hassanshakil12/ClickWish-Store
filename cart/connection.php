<?php
$servername = "localhost";
$user = "root";
$password = "";
$dbname = "clickwish";

$conn = new mysqli($servername, $user, $password, $dbname);

if (!$conn) {
    die("Connection Failed");
}

echo "<script>console.log('Connection Successfull')</script>";
?>