<?php
var_dump($_POST);
$publishes = $db->prepare("UPDATE publishes SET `year` = :year, `title` = :title, `createdWith` = :createdWith, `participation` = :participation, `doi`=:doi, date=:date, `numOfPoints`=:numOfPoints, `conference`=:conference WHERE id = :id" );
$publishes->bindParam(':id', $_POST['id']);
$publishes->bindParam(':year', $_POST['year']);
$publishes->bindParam(':title', $_POST['title']);
$publishes->bindParam(':createdWith', $_POST['createdWith']);
$publishes->bindParam(':participation', $_POST['participation']);
$publishes->bindParam(':doi', $_POST['doi']);
$publishes->bindParam(':date', $_POST['date']);
$publishes->bindParam(':numOfPoints', $_POST['numOfPoints']);
$publishes->bindParam(':conference', $_POST['conference']);
?>