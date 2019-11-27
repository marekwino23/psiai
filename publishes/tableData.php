<?php 
foreach($publishes as $row) {
	
echo "<tr>";
	echo '<td><input type="checkbox" name="row_'.$row['id'].'" /></td>';
	echo "<td>'".$row['year']."'</td>";
	echo "<td>'".$row['title']."'</td>";
	echo "<td>'".$row['createdWith']."'</td>";
	echo "<td>'".$row['participation']."'</td>";
	echo "<td>'".$row['doi']."'</td>";
	echo "<td>'".$row['date']."'</td>";
	echo "<td>'".$row['numOfPoints']."'</td>";
	echo "<td>'".$row['conference']."'</td>";
	if(!empty($_SESSION['typ'])) {
		if($_SESSION['typ'] == 'admin' || $_SESSION['id'] === $row['user_id']) {
	echo '<td>
		<a href="./publishes/form.php?id='.$row['id'].'">edit</a>
		</td>';
		}
	if($_SESSION['typ'] == 'admin'){
		echo '<td>
		<a href="./publishes/delete.php?id='.$row['id'].'">delete</a>
		</td>';
		}
	}
echo "</tr>";
            }
?>