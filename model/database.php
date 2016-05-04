<?php
    $dsn = 'mysql:host=localhost;dbname=momm';
//    $dsn = 'mysql:host=localhost;dbname=meredi35_momm';
    $username = 'root';
//    $username = 'merebrownie';
//    $username = 'meredi35_admin';
//    $password = 'brow4780';
    
    try {
//        $db = new PDO($dsn, $username, $password);
        $db = new PDO($dsn, $username);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>