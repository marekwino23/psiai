<?php
 require_once('./../config/connection.php');
 $idQuery = $db->prepare('SELECT id FROM user WHERE login = :email');
$idQuery->bindParam(':email', $_SESSION['email']); 
if ($idQuery->execute() && $idQuery->fetchColumn() != $_POST['id'] ) {
    $user = $db->prepare("DELETE FROM user WHERE id = :id " );
    $user->bindParam(':id', $_POST['id']);
    $user->execute();  
}
header('Location: ./../index.php');
?>