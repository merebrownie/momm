<?php

function add_playlist($userID, $name, $category) {
    global $db;
    $query = "INSERT INTO playlists (userID, name, category)
              VALUES (:userID, :name, :category)";
              
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':category', $category);
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

function get_playlists_by_userid($userID) {
    global $db;
    $query = 'SELECT * FROM playlists
              WHERE userID = :userID';
    $statement = $db->prepare($query);
    $statement->bindValue(":userID", $userID);
    $statement->execute();
    $playlists = $statement->fetchAll();
    $statement->closeCursor();
    return $playlists;
}

function get_users_playlists_by_category($userID, $category) {
    global $db;
    $query = 'SELECT * FROM playlists 
              WHERE userID = :userID 
              AND category = :category';
    $statement = $db->prepare($query);
    $statement->bindValue(":userID", $userID);
    $statement->bindValue(":category", $category);
    $statement->execute();
    $playlists = $statement->fetchAll();
    $statement->closeCursor();
    return $playlists;
}

function get_all_playlists_by_category($category) {
    global $db;
    $query = 'SELECT * FROM playlists
              WHERE category = :category';
    $statement = $db->prepare($query);
    $statement->bindValue(":category", $category);
    $statement->execute();
    $playlists = $statement->fetchAll();
    $statement->closeCursor();
    return $playlists;
}

function get_playlists_by_name($name) {
    global $db;
    $query = 'SELECT * FROM playlists
              WHERE name = :name';
    $statement = $db->prepare($query);
    $statement->bindValue(":name", $name);
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

function search_playlists($search) {
    global $db;
    $query = 'SELECT * FROM playlists '
            . 'WHERE name LIKE :search '
            . 'OR category LIKE :search';
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
