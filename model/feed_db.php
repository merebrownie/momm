<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get_feed() {
    global $db;
    $query = 'SELECT songID id, title name, timestamp '
            . 'FROM songs '
            . 'UNION '
            . 'SELECT playlistID id, name, timestamp '
            . 'FROM playlists '
            . 'ORDER BY timestamp';
    $statement = $db->prepare($query);
    $statement->execute();
    $events = $statement->fetchAll();
    $statement->closeCursor();
    return $events;
}
?>


