<?php
require_once('./../config/connection.php');
$ERROR = array("user" => '',"email"=>'', "password"=>'');
if(isset($_POST['login'])) {
    if(empty($_POST['email'])) {
        $ERROR['email'] = 'is required';
    }
    if(empty($_POST['password'])) {
        $ERROR['password'] = 'is required';
    }
    if(!empty($_POST['email']) && !empty($_POST['password'])) {
        try {
            $user = $db->prepare('SELECT `id`, `typ` FROM user WHERE login = :email AND password = :password');
            $user->bindParam(':email', $_POST['email']);
            $user->bindParam(':password', md5($_POST['password']));
            $user->execute();
            $result = $user->fetchAll();
            if ($result[0]['typ']) {
                $_SESSION['id'] = $result[0]['id'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['typ'] = $result[0]['typ'];
                 header('Location: ./../index.php');
                 die();
            } else {
                $ERROR['user'] = "email '".$_POST['email']."' does not exist or wrong password";
                $user = null;
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
?>
<html>
<head>
<title> Login </title>
<meta charset = "UTF-8">
<link rel="Stylesheet" href="./../css/style_login.css">
</head>
<body>
    <?php require_once('./../layout/header.php') ?>
    <h2>LOGOWANIE</h2>
    <span class="error"><?php echo $ERROR['user'] ?></span>    
    <form method="POST">
        <label class="btn">Login</label>
        <input name="email" placeholder="@example.com" type="email" size="25">
        <span class="error"><?php echo $ERROR['email'] ?></span>
        <label class="btn">Hasło </label> 
        <input type="password" name="password" size="25" >
        <span class="error"><?php echo $ERROR['password'] ?></span>
        <div class="down">
            <button type="submit" name="login" value="login">Zaloguj</button>
            <span> Zapomniałeś hasla ?</span>
            <a class="link" href="/"> RESETUJ</a>
        </div>
    </form>
</body>
</html>