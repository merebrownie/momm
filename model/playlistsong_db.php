<?php

function add_playlistsong($playlistID, $songID) {
    global $db;
    $query = "INSERT INTO playlistsongs (playlistID, songID)
              VALUES (:playlistID, :songID)";
              
//    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':playlistID', $playlistID);
        $statement->bindValue(':songID', $songID);
        $statement->execute();
        $statement->closeCursor();
//    } catch (PDOException $e) {
//        $error_message = $e->getMessage();
//        display_db_error($error_message);
//    }
}

function get_playlistsong_by_ids($playlistID, $songID) {
    global $db;
    $query = 'SELECT * FROM playlistsongs
              WHERE playlistID = :playlistID AND userID = :userID';
    $statement = $db->prepare($query);
    $statement->bindValue(":playlistID", $playlistID);
    $statement->bindValue(":userID", $userID);
    $statement->execute();
    $playlist = $statement->fetch();
    $statement->closeCursor();
    return $playlist;
}

function get_playlistsongs_by_playlistid($playlistID) {
    global $db;
    $query = 'SELECT * FROM playlistsongs
              WHERE playlistID = :playlistID
              ORDER BY timestamp';
    $statement = $db->prepare($query);
    $statement->bindValue(":playlistID", $playlistID);
    $statement->execute();
    $songs = $statement->fetchAll();
    $statement->closeCursor();
    return $songs;
}

function get_playlistsongs_by_songid($songID) {
    global $db;
    $query = 'SELECT * FROM playlistsongs
              WHERE songID = :songID';
    $statement = $db->prepare($query);
    $statement->bindValue(":songID", $songID);
    $statement->execute();
    $songs = $statement->fetchAll();
    $statement->closeCursor();
    return $songs;
}

function delete_playlistsong($playlistID, $songID) {
    global $db;
    $query = 'DELETE FROM users
              WHERE userID = :userID';
    $statement = $db->prepare($query);
    $statement->bindValue(':userID', $userID);
    $statement->execute();
    $statement->closeCursor();
}

?>