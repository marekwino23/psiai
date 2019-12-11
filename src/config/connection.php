<?php
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DBNAME', '');
    try {
        $db = new PDO('mysql:host=localhost;dbname=newDB', USERNAME, PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        session_start();
    } catch (PDOException $e) {
        $db->query('CREATE DATABASE newDB');
        print "Error!: " . $e->getMessage() . "<br/>";
        echo "Database created successfully with the name newDB";
        die();
    }
?>