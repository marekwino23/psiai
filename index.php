<?php require_once('./config/connection.php'); 
    if(isset($_POST['logout'])) {
        session_destroy();
        header('Location: index.php');
        $db = null;
    }
?>
<html>
<head>
<title>Strona główna</title>
<meta charset = "UTF-8">
<link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php require_once('./layout/header.php'); ?>
    <?php 

    if(!empty($_SESSION['email'])) {
        echo 'Witaj '.$_SESSION['email'].'';
        echo '<form method="POST">
        <button name="logout">logout</button>
        </form>';
    }

    if(empty($_SESSION['email'])) {
        if(isset($_SESSION['register'])) {
        echo "Dziekujemy za rejestracje. Możesz teraz sie zalogowac";
        session_destroy();
        }
            echo '<h2>Logowanie</h2>    
        <div class="main">
            <a class="btn" href="./user/login.php">ZALOGUJ</a>
            <a class="btn" href="./user/register.php">ZAREJESTRUJ</a>
        </div>';
    }
    require_once('./layout/footer.php') ?>
</body>
</html>