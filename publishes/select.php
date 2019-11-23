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
            echo '<tr><th><a href="?order=year&sort='.$sort.'">year</a></th><th><a href="?order=title&sort='.$sort.'">title</a></th><th><a href="?order=createdWith&sort='.$sort.'">createdWith</a></th>
            <th><a href="?order=participation&sort='.$sort.'">participation</a></th><th><a href="?order=doi&sort='.$sort.'">doi</a></th><th><a href="?order=date&sort='.$sort.'">date</a></th><th><a href="?order=numOfPoints&sort='.$sort.'">numofPoints</a><th><a href="?order=conference&sort='.$sort.'">conference</a></th>'.$actions.'</tr>';
            echo "</thread>";
            echo "<tbody>";
            foreach($publishes as $row) {
                echo "<tr>";
                    echo "<td>'".$row['year']."'</td>";
                    echo "<td>'".$row['title']."'</td>";
                    echo "<td>'".$row['createdWith']."'</td>";
                    echo "<td>'".$row['participation']."'</td>";
                    echo "<td>'".$row['doi']."'</td>";
                    echo "<td>'".$row['date']."'</td>";
                    echo "<td>'".$row['numOfPoints']."'</td>";
                    echo "<td>'".$row['conference']."'</td>";
                    if(!empty($_SESSION['typ'])) {
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
            echo "</tbody>";
            echo "</table>";
            }
            ?>