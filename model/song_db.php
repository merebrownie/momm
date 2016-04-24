<?php

function add_song($title, $artist, $genre) {
    global $db;
    $query = "INSERT INTO songs (title, artist, genre)
              VALUES (:title, :artist, :genre)";
              
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':artist', $artist);
        $statement->bindValue(':genre', $genre);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_song_by_id($songID) {
    global $db;
    $query = 'SELECT * FROM songs
              WHERE songID = :songID';
    $statement = $db->prepare($query);
    $statement->bindValue(":songID", $songID);
    $statement->execute();
    $song = $statement->fetch();
    $statement->closeCursor();
    return $song;
}

function delete_song($songID) {
    global $db;
    $query = 'DELETE FROM songs
              WHERE songID = :songID';
    $statement = $db->prepare($query);
    $statement->bindValue(':songID', $songID);
    $statement->execute();
    $statement->closeCursor();
}

?>