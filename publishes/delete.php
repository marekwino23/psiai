<?php
require_once('./../config/connection.php');
$user = $db->prepare("DELETE FROM publishes WHERE id = :id" );
$user->bindParam(':id', $_POST['id']);
if ( $user->execute()) {
   header('Location: ./../index.php');
}
?>