<?php
require('../model/database.php');
require('../model/user_db.php');
require('../model/song_db.php');
require '../model/playlist_db.php';

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_songs'; // fault action
    }
}

if ($action == 'show_add_song_form') {
    include 'song_add.php';
} elseif ($action == 'add_song') {
    
    // get form data
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $artist = filter_input(INPUT_POST, 'artist', FILTER_SANITIZE_STRING);
    $genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);
    
    // add user to database
    add_song($title, $artist, $genre);
    $songs = get_songs();
    include 'song_list.php';
} elseif ($action == 'list_songs') {
//    get_playlists_by_userid($userID);
    $songs = get_songs();
    include 'song_list.php';
} elseif ($action == 'view_song') {
    $songID = filter_input(INPUT_POST, 'songID', FILTER_VALIDATE_INT);
    if ($songID === NULL) {
        $songID = filter_input(INPUT_GET, 'songID', FILTER_VALIDATE_INT);
    }
    $song = get_song_by_id($songID);
    // need to change to get_playlists_by_userid();
    $playlists = get_playlists();
    include 'song.php';
}
?>
