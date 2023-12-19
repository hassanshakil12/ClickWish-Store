<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clickwish";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection Failed");
}

echo "<script>console.log('Connection Successfull')</script>";
?>