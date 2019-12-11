<?php 
require_once('./config/connection.php'); 
$firstname = '';
$email = '';
$msg = '';

$ERROR = array("firstname"=>'',"email"=>'',"msg"=>'');
if($_POST && isset($_POST['wyslij'])) {
    if(empty($_POST['firstname'])) {
        $ERROR['firstname'] = 'is required';
    }
    if(empty($_POST['email'])) {
        $ERROR['email'] = 'is required';
    }
    if(empty($_POST['msg'])) {
        $ERROR['msg'] = 'is required';
    }
    
    
    if(!empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['msg'])) {
        try {
        $messages = $db->prepare("INSERT INTO contact
        (`firstname`, `email`, `msg`) 
        VALUES 
        (:firstname, :email, :msg)");
        $messages->bindParam(':firstname', $_POST['firstname']);
        $messages->bindParam(':email', $_POST['email']);
        $messages->bindParam(':msg', $_POST['msg']);

            
        if ($messages->execute())  {
            header('Location: ./index.php');
            die(); 
        }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            var_dump($_POST);
        }
    }
}


?>
<html>
<head>
<email> kontakt </email>
<meta charset = "UTF-8">
<link rel="Stylesheet" href="./css/style_login.css">
</head>
<body>
   
	
    <form method="POST">
    <a href="index.php"> <p> Back </p> </a>
    <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
    <div class="form-field">
        <label class="form-label">firstname </label>
        <input type="text" name="firstname" value="<?php echo $firstname ?>">
        <span class="error"><?php echo $ERROR['firstname'] ?></span>
    </div>
    <div class="form-field">
        <label class="form-label">email</label>
        <input type="text" name="email" value="<?php echo $email ?>">
        <span class="error"><?php echo $ERROR['email'] ?></span>
    </div>
    <div class="form-field">
        <label class="form-label">wiadomość</label>
        <input type="text" name="msg" value="<?php echo $msg ?>">
        <span class="error"><?php echo $ERROR['msg'] ?></span> 
    </div>
   
    <button name="wyslij" value="wyslij"> Wyślij </button> 
    </form>
    </body>
    </html>
