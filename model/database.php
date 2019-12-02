<?php
    $dsn = 'mysql:host=localhost;dbname=momm';
    $username = $_SERVER['DB_USER'];
    $password = $_SERVER['DB_PASS'];
    
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        error_log($error_message);
        include('/momm/errors/database_error.php');
        exit();
    }
?>