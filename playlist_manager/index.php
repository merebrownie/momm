<?php
require('../model/database.php');
require('../model/playlist_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_playlists'; // fault action
    }
}

if ($action == 'show_add_playlist_form') {
    include 'add_playlist.php';
} elseif ($action == 'add_playlist') {
    
    // get form data
    $userID = filter_input(INPUT_POST, 'userID', FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
    
    // add user to database
    add_playlist($userID, $name, $category);
    $playlists = get_playlists_by_userid($userID);
    include 'playlist_list.php';
} elseif ($action == 'show_playlists') {
    $playlists = get_playlists();
    include 'playlist_list.php';
}
?>
