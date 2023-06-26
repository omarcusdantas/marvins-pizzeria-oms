<?php 
    include("./src/process/conn.php");
    $msg = "";

    if (isset($_SESSION["msg"])) {
        $msg = $_SESSION["msg"];
        $status = $_SESSION["status"];
        $_SESSION["msg"] = "";
        $_SESSION["status"] = "";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="./src/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./src/img/favicon-32x32.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/reset.css">
    <link rel="stylesheet" href="./src/css/template.css">
    <link rel="stylesheet" href="./src/css/index.css">
    <link rel="stylesheet" href="./src/css/dashboard.css">
    <title>Marvin's Pizzeria OMS</title>
</head>
<body>
    <header>
        <a href="./index.php" class="logo">
            <img src="./src/img/marvins-logo.png" alt="Marvin's Pizzeria">
            <h1>Marvin's Pizzeria OMS</h1>
        </a>
        <nav>
            <a href="./index.php">Register Order</a>
            <div class="menu-space"></div>
            <a href="./dashboard.php">Order Management</a>
        </nav>
    </header>
    <?php if ($msg !== ""): ?>
        <div class="alert alert-<?= $status?>">
            <p><?= $msg ?></p>
        </div>
    <?php endif; ?>