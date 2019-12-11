<?php require_once('./../config/connection.php'); 
if(empty($_SESSION['email'])) $_SESSION['email'] = '';
if(empty($_SESSION['password'])) $_SESSION['password'] = '';
if(empty($_SESSION['uczelnia'])) $_SESSION['uczelnia'] = '';
$ERROR = array("uczelnia"=>'',"email"=>'',"password"=>'');
if($_POST && $_POST['register']) {
    if(isset($_POST['uczelnia'])) {
        $ERROR['uczelnia'] = 'is required';
    }
    if(empty($_POST['email'])) {
        $ERROR['email'] = 'is required';
    }
    if(empty($_POST['password'])) {
        $ERROR['password'] = 'is required';
    }
    if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['uczelnia'])) {
        try {
            $idQuery = $db->query('SELECT MAX(id) FROM user');
            $id = 0;
            foreach ($idQuery as $row) {
                $id = $row["MAX(id)"] + 1;
            }
            // $data = [
            //     "id" => $id,
            //     "login" => $_POST['email'],
            //     "password" => $_POST['password'],
            //     "uniwersity" => $_POST['uczelnia']
            // ];
            $user = $db->prepare("INSERT INTO user (`id`, `login`, `password`, `uniwersity`) VALUES (:id, :login, :password, :university)" );
            $user->bindParam(':id', $id);
            $user->bindParam(':login', $_POST['email']);
            $user->bindParam(':password', md5($_POST['password']));
            $user->bindParam(':university', $_POST['uczelnia']);
        if ( $user->execute()) {
            $_SESSION['register'] = true;
            header('Location: ./../index.php');
            die();
        }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }
}
?>
<html>
<head>
<title> Rejestracja </title>
<meta charset = "UTF-8">
<link rel="Stylesheet" href="./../css/style_login.css">
</head>
<body>
    <?php require_once('./../layout/header.php') ?>
    <h2>Rejestracja</h2>    
    <form acion="index.php" method="POST">
    <div class="form-field">
        <label class="form-label">UCZELNIA: </label>
        <input type="text" name="uczelnia" value="<?php echo $_SESSION['uczelnia'] ?>">
        <span class="error"><?php echo $ERROR['uczelnia'] ?></span>
    </div>
    <div class="form-field">
        <label class="form-label">E-mail</label>
        <input type="email" name="email" value="<?php echo $_SESSION['email'] ?>">
        <span class="error"><?php echo $ERROR['email'] ?></span>
    </div>
    <div class="form-field">
        <label class="form-label">Hasło</label>
        <input type="password" name="password" value="<?php echo $_SESSION['password'] ?>">
        <span class="error"><?php echo $ERROR['password'] ?></span> 
    </div>
    <button name="register" value="register">Rejestruj</button> 
    </form>
</body>
</html>