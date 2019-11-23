<?php
$us = $db->query('SELECT * FROM user Where Typ != "admin,user" ');
            $users =  $us->fetchAll();
            if($users) {
                echo "<table>";
            echo "<thead>";
            echo "<tr><th>email</th><th>password</th><th>uniwersity</th></tr>";
            echo "</thread>";
            echo "<tbody>";
            foreach($users as $row) {
                echo "<tr>";
                    echo "<td>'".$row['login']."'</td>";
                    echo "<td>'".$row['password']."'</td>";
                    echo "<td>'".$row['uniwersity']."'</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            }
            ?>