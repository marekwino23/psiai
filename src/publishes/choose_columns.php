<?php
$columns = '';
if(!empty($_POST['year'])) {
$columns = '`year`,';
}
if(!empty($_POST['title'])) {
$columns = $columns.'`title`,';
}
if(!empty($_POST['createdWith'])) {
$columns = $columns.' `createdWith`,';
}
if(!empty($_POST['participation'])) {
$columns = $columns.' `participation`,';
}
if(!empty($_POST['doi'])) {
$columns = $columns.' `doi`,';
}
if(!empty($_POST['date'])) {
$columns = $columns.' `date`,';
}
if(!empty($_POST['numOfPoints'])) {
$columns = $columns.' `numOfPoints`,';
}
if(!empty($_POST['conference'])) {
$columns = $columns.' `conference`';
}
if(empty($columns)) {
	$columns = '*';
} else {
	$all = false;
	$columns = rtrim($columns, ',');
}
?>