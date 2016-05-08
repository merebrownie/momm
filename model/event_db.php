<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function add_event($type, $message) {
    global $db;
    $query = "INSERT INTO events (type, message)
              VALUES (:type, :message)";
              
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':type', $type);
        $statement->bindValue(':message', $message);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_events_by_timestamp() {
    global $db;
    $query = 'SELECT * FROM events '
            . 'ORDER BY timestamp DESC '
            . 'LIMIT 30';
    $statement = $db->prepare($query);
    $statement->execute();
    $events = $statement->fetchAll();
    $statement->closeCursor();
    return $events;
}
