<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<?php

include("tools/DatabaseLinker.php");

include_once("tools/SuperController.php");
$page = "connexion";

if (!empty($_GET['page'])) {
    $page = $_GET['page'];
}


SuperController::callPage($page);
?>
</body>
</html>