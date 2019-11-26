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
    <?php require_once('./layout/header.php'); 
    $search = !empty($_POST['searchVal']) ? $_POST['searchVal'] : '';
    ?>
    <form action="index.php" method="POST">
        <input type="text" name="searchVal" placeholder="Znajdź artykuł" value="<?php echo $search ?>" />
        <input type="submit" name="search" value="Search.."/>
    </form>
    <?php 

    if(!empty($_SESSION['email'])) {
        echo 'Witaj '.$_SESSION['email'].'';
        echo '<form method="POST">
        <button name="logout">logout</button>
        </form>';
    }

    if(!empty($_SESSION['typ']) && $_SESSION['typ'] == 'admin') {
        echo '<a href="tools.php">Odebrane wiadomości </a>';
        }

    if(!empty($_SESSION['email'])) {
        echo '<a href="./publishes/form.php">Stwórz publikacje</a>';
    }
       if(!empty($_SESSION['typ']) && $_SESSION['typ'] == 'admin') {
        echo "<h3>Użytkownicy: </h3>";
		require_once('./user/select.php');
        }
        echo "<h3>Publikacje: </h3>";
		echo '<form action="./publishes/export.php" method="POST">';
    require_once('./publishes/select.php');
    
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
    require_once('./layout/footer.php');
	echo '</form>';
	?>
    <a href="kontakt.php"> <p> Kontakt z administratorem </p> </a>
</body>
</html>