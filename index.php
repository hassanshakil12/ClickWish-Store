<?php include("./user/connection.php"); 

$payload = isset($_GET['payload']) ? $_GET['payload'] : null;
$page = "home";
if ($payload and $payload != "index.php") {
    $page = htmlspecialchars($payload);
}

$pageFile = "./" . $page . ".php";

if (file_exists($pageFile)) {
    include_once($pageFile);
} else {
    http_response_code(404);
    include_once("./404.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@100;300;400;500;700;800;900&family=Red+Hat+Display:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>ClickWish Store</title>
</head>
<body>
    <?php include("navbar.php"); ?>
    <?php include("content.php");?>
    <script src="./script.js"></script>
</body>
</html>