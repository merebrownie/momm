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
    $query = 'SELECT * FROM songs';
    $statement = $db->prepare($query);
    $statement->execute();
    $songs = $statement->fetchAll();
    $statement->closeCursor();
    return $songs;
}

function get_songs_by_artist($artist) {
    global $db;
    $query = 'SELECT * FROM songs '
            . 'WHERE artist = :artist';
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
            . 'WHERE genre = :genre';
    $statement = $db->prepare($query);
    $statement->bindValue(':genre', $genre);
    $statement->execute();
    $songs = $statement->fetchAll();
    $statement->closeCursor();
    return $songs;
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
            . 'OR genre LIKE :search';
    $statement = $db->prepare($query);
    $statement->bindValue(':search', $search);
    $statement->execute();
    $songs = $statement->fetchAll();
    return $songs;
}

?>