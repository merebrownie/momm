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

function get_songs() {
    global $db;
    $query = 'SELECT * FROM songs '
            . 'ORDER BY title';
    $statement = $db->prepare($query);
    $statement->execute();
    $songs = $statement->fetchAll();
    $statement->closeCursor();
    return $songs;
}

function get_songs_by_artist($artist) {
    global $db;
    $query = 'SELECT * FROM songs '
            . 'WHERE artist LIKE :artist '
            . 'ORDER BY title';
    $statement = $db->prepare($query);
    $statement->bindValue(':artist', $artist);
    $statement->execute();
    $songs = $statement->fetchAll();
    $statement->closeCursor();
    return $songs;
}

function get_songs_by_genre($genre) {
    global $db;
    $query = 'SELECT * FROM songs '
            . 'WHERE genre LIKE :genre '
            . 'ORDER BY title';
    $statement = $db->prepare($query);
    $statement->bindValue(':genre', $genre);
    $statement->execute();
    $songs = $statement->fetchAll();
    $statement->closeCursor();
    return $songs;
}

function get_new_songs() {
    global $db;
    $query = 'SELECT * FROM songs '
            . 'ORDER BY timestamp DESC '
            . 'LIMIT 5';
    $statement = $db->prepare($query);
    $statement->execute();
    $new_songs = $statement->fetchAll();
    $statement->closeCursor();
    return $new_songs;
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

function search_songs($search) {
    global $db;
    $query = 'SELECT * FROM songs '
            . 'WHERE title LIKE :search '
            . 'OR artist LIKE :search '
            . 'OR genre LIKE :search '
            . 'ORDER BY title';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':search', '%' . $search . '%');
        $statement->execute();
        $songs = $statement->fetchAll();
        $statement->closeCursor();
        return $songs;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_songs_in_order() {
    global $db;
    $query = 'SELECT * FROM songs '
            . 'ORDER BY timestamp';
    $statement = $db->prepare($query);
    $statement->execute();
    $songs = $statement->fetchAll();
    $statement->closeCursor();
    return $songs;
}

?>