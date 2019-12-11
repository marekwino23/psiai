<?php
$query = 'SELECT * FROM publishes';
$order = '';
$sort = 'asc';
if(!empty($_GET['order'])) {
    $order = $_GET['order'];
}
if(!empty($_GET['sort'])) {
    $sort = $_GET['sort'] == 'asc' ? 'desc' : 'asc';
}
if(!empty($_POST['searchVal'])) {
    $search = $_POST['searchVal'];
    $query = $query." WHERE CONCAT(`year`, `title`, `createdWith`, `participation`, `doi`, `date`, `numofPoints`, `conference`) LIKE '%$search%'";
}
if(!empty($order) && !empty($sort)) {
    $query= $query.' ORDER BY '.$order.' '.$sort;
}
        $pub = $db->query($query);
        $publishes =  $pub->fetchAll();
            if($publishes) {
            $actions = '';
            if(!empty($_SESSION['typ'])) {
                $actions = '<th colspan="2"> actions </th>';
            }
			echo "<table>";
            echo "<thead>";
            echo '<tr><th>export</th><th><a href="?order=year&sort='.$sort.'">year</a><input type="checkbox" name="year" /></th><th><a href="?order=title&sort='.$sort.'">title</a><input type="checkbox" name="title" /></th><th><a href="?order=createdWith&sort='.$sort.'">createdWith</a><input type="checkbox" name="createdWith" /></th>
            <th><a href="?order=participation&sort='.$sort.'">participation</a><input type="checkbox" name="participation" /></th><th><a href="?order=doi&sort='.$sort.'">doi</a><input type="checkbox" name="doi" /></th><th><a href="?order=date&sort='.$sort.'">date</a><input type="checkbox" name="date"</th><th><a href="?order=numOfPoints&sort='.$sort.'">numofPoints</a><input type="checkbox" name="numOfPoints" /><th><a href="?order=conference&sort='.$sort.'">conference</a><input type="checkbox" name="conference" /></th>'.$actions.'</tr>';
            echo "</thead>";
            echo "<tbody>";
            require_once('tableData.php');
            echo "</tbody>";
            echo "</table>";
            }
            ?>