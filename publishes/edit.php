
<?php 
$publishes = $db->prepare("SELECT * FROM publishes Where id =:id" );
$publishes->bindParam(':id', $_GET['id']);
   ?>