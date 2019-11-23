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
            echo "<table>";
            echo "<thead>";
            echo '<tr><th>year</th><th>title</th><th>createdWith</th>
            <th>participation</th><th>doi</th><th>date</th><th>numofPoints<th>conference</th></tr>';
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
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            }
            ?>