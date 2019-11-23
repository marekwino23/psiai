<?php
$idQuery = $db->query('SELECT MAX(id) FROM publishes');
$id = 0;
foreach ($db->query('SELECT MAX(id) FROM publishes') as $row) {
    $id = $row["MAX(id)"] + 1;
}
$publishes = $db->prepare("INSERT INTO publishes 
(`id`, `year`, `title`, `createdWith`, `participation`, `doi`, `date`, `numOfPoints`, `conference`) 
VALUES 
(:id, :year, :title, :createdWith, :participation, :doi, :date, :numOfPoints, :conference )" );
$publishes->bindParam(':id', $id);
$publishes->bindParam(':year', $_POST['year']);
$publishes->bindParam(':title', $_POST['title']);
$publishes->bindParam(':createdWith', $_POST['createdWith']);
$publishes->bindParam(':participation', $_POST['participation']);
$publishes->bindParam(':doi', $_POST['doi']);
$publishes->bindParam(':date', $_POST['date']);
$publishes->bindParam(':numOfPoints', $_POST['numOfPoints']);
$publishes->bindParam(':conference', $_POST['conference']);
?>