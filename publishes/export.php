<?php
$doc_body ="<h1> Publikacje </h1>";
$all = true;
if(isset($_POST['submit_docs'])){
include("../config/connection.php");
require_once('choose_columns.php');
require_once('choose_rows.php');
var_dump("SELECT ".$columns." FROM publishes ".$rows);
$publishes = $db->query("SELECT ".$columns." FROM publishes ".$rows);  	
header("Content-Type: application/vnd.msword");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-chceck=0, pre-check=0");
header("content-disposition: attachment; filename=publishes.doc");
?>
<html>
<head>
<title> Wyeksportowane publikacje </title>
<meta charset="UTF-8" />
<style>
table tr th, table tr td {
	border: 1px solid black;
	border-collapse: collapse;
}
</style>
</head>
<body>
<?php echo $doc_body;
echo "<table>";
	echo "<thead>";
	echo "<tr>";
	echo !empty($_POST['year']) || $all ? "<th>year</th>" : '';
	echo !empty($_POST['title']) || $all ? "<th>title</th>" : '';
	echo !empty($_POST['createdWith']) || $all ? "<th>createdWith</th>" : '';
	echo !empty($_POST['participation']) || $all ? "<th>participation</th>" : '';
	echo !empty($_POST['doi']) || $all ? "<th>doi</th>" : '';
	echo !empty($_POST['date']) || $all ? "<th>date</th>" : '';
	echo !empty($_POST['numOfPoints']) || $all ? "<th>numOfPoints</th>" : '';
	echo !empty($_POST['conference']) || $all ? "<th>conference</th>" : '';
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	foreach($publishes as $row) {
	echo "<tr>";
	if($all) {
		echo "<td>'".$row['year']."'</td>";
		echo "<td>'".$row['title']."'</td>";
		echo "<td>'".$row['createdWith']."'</td>";
		echo "<td>'".$row['participation']."'</td>";
		echo "<td>'".$row['doi']."'</td>";
		echo "<td>'".$row['date']."'</td>";
		echo "<td>'".$row['numOfPoints']."'</td>";
		echo "<td>'".$row['conference']."'</td>";
	}
	echo !empty($_POST['year']) ? "<td>'".$row['year']."'</td>" : '';
	echo !empty($_POST['title']) ? "<td>'".$row['title']."'</td>" : '';
	echo !empty($_POST['createdWith']) ? "<td>'".$row['createdWith']."'</td>" : '';
	echo !empty($_POST['participation']) ? "<td>'".$row['participation']."'</td>" : '';
	echo !empty($_POST['doi']) ? "<td>'".$row['doi']."'</td>" : '';
	echo !empty($_POST['date']) ? "<td>'".$row['date']."'</td>": '';
	echo !empty($_POST['numOfPoints']) ? "<td>'".$row['numOfPoints']."'</td>" : '';
	echo !empty($_POST['conference']) ? "<td>'".$row['conference']."'</td>" : '';
	echo "</tr>";
            }
			?>
	</tbody>
    </table>
	</body>
</html>
<?php }
exit;
?>