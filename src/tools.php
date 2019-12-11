<?php require_once('./config/connection.php');
 $cs = $db->query('SELECT * FROM contact');
 $contacts =  $cs->fetchAll();
?>

<html>
<head>
<title> Strona główna </title>
<meta charset = "UTF-8">
<link rel="stylesheet" href="./css/style.css">
</head>
<body>
<a href="index.php"> <p> Back </p> </a>
    <?php require_once('./layout/header.php');
     if($contacts) {
        echo "<table>";
    echo "<thead>";
    echo "<tr><th>firstname</th><th>email</th><th>msg</th></tr>";
    echo "</thread>";
    echo "<tbody>";
    foreach($contacts as $row) {
        echo "<tr>";
            echo "<td>'".$row['firstname']."'</td>";
            echo "<td>'".$row['email']."'</td>";
            echo "<td>'".$row['msg']."'</td>";
   
            echo '<td>
            <form action="./erase.php" method="POST">
                <input type="hidden" name="id" value="'.$row['id'].'">
                <button type="submit">delete</button>
            </form>
            </td>';
   
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    }
    ?>