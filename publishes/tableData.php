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
	if(!empty($_SESSION['typ'] && $_SESSION['id'] == $row['user_id'])) {
		echo '<td>
		<form action="./publishes/form.php" method="POST">
		<input type="hidden" name="id" value="'.$row['id'].'">
		<button type="submit">edit</button>
		</form>
		</td>';
	if($_SESSION['typ'] == 'admin'){
		echo '<td>
		<form action="./publishes/delete.php" method="POST">
		<input type="hidden" name="id" value="'.$row['id'].'">
		<button type="submit">delete</button>
		</form>
		</td>';
		}
	}
echo "</tr>";
            }
?>