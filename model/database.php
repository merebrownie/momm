<?php
    $dsn = 'mysql:host=localhost;dbname=momm';
    $username = 'root';
//    $username = 'merebrownie';
    $password = 'brow4780';
    
    try {
//        $db = new PDO($dsn, $username, $password);
        $db = new PDO($dsn, $username);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        error_log($error_message);
        include('/momm/errors/database_error.php');
        exit();
    }
?>