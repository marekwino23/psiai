<?php require_once('./config/connection.php'); ?>
<html>
<head>
<title> Strona główna </title>
<meta charset = "UTF-8">
<link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php require_once('./layout/header.php'); ?>
    <?php 
            echo '<h2>Logowanie</h2>    
        <div class="main">
            <a class="btn" href="./user/login.php">ZALOGUJ</a>
            <a class="btn" href="./user/register.php">ZAREJESTRUJ</a>
        </div>';
    require_once('./layout/footer.php') ?>
</body>
</html>