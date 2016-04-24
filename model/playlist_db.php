<?php

function add_playlist($playlist_userID, $playlist_name, $playlist_category) {
    global $db;
    $query = "INSERT INTO playlists (userID, name, category)
              VALUES (:userID, :name, :category)";
              
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $playlist_userID);
        $statement->bindValue(':name', $playlist_name);
        $statement->bindValue(':category', $playlist_category);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_playlist_by_id($playlistID) {
    global $db;
    $query = 'SELECT * FROM playlists
              WHERE playlistID = :playlistID';
    $statement = $db->prepare($query);
    $statement->bindValue(":playlistID", $playlistID);
    $statement->execute();
    $playlist = $statement->fetch();
    $statement->closeCursor();
    return $playlist;
}

function get_playlists_by_userid($playlist_userID) {
    global $db;
    $query = 'SELECT * FROM playlists
              WHERE userID = :userID';
    $statement = $db->prepare($query);
    $statement->bindValue(":userID", $playlist_userID);
    $statement->execute();
    $playlists = $statement->fetchAll();
    $statement->closeCursor();
    return $playlists;
}

function get_playlists_by_category($playlist_category) {
    global $db;
    $query = 'SELECT * FROM playlists
              WHERE category = :category';
    $statement = $db->prepare($query);
    $statement->bindValue(":category", $playlist_category);
    $statement->execute();
    $playlists = $statement->fetchAll();
    $statement->closeCursor();
    return $playlists;
}

function get_playlists_by_name($playlist_name) {
    global $db;
    $query = 'SELECT * FROM playlists
              WHERE name = :name';
    $statement = $db->prepare($query);
    $statement->bindValue(":name", $playlist_name);
    $statement->execute();
    $playlists = $statement->fetchAll();
    $statement->closeCursor();
    return $playlists;
}

function get_playlists() {
    global $db;
    $query = 'SELECT * FROM playlists';
    $statement = $db->prepare($query);
    $statement->execute();
    $playlists = $statement->fetchAll();
    $statement->closeCursor();
    return $playlists;
}

function delete_playlist($playlistID) {
    global $db;
    $query = 'DELETE FROM playlists
              WHERE playlistID = :playlistID';
    $statement = $db->prepare($query);
    $statement->bindValue(':playlistID', $playlistID);
    $statement->execute();
    $statement->closeCursor();
}

?>