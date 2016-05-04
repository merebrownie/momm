<?php
session_start();

require('../model/database.php');
require '../model/song_db.php';
require('../model/playlist_db.php');
require('../model/playlistsong_db.php');
require '../model/user_db.php';
require '../model/event_db.php';

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_playlists'; // default action
    }
}

if (!isset($_SESSION['userID'])) {
    include '../user_manager/login.php';
} else {
    $userID = $_SESSION['userID'];
}

if ($action == 'show_add_playlist_form') {
    $user = get_user_by_id($userID);
    $songs = get_songs();
    include 'playlist_add.php';
    
} elseif ($action == 'add_playlist') {
    
    // get form data
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
    
    // add playlist to database
    add_playlist($userID, $name, $category);
    // add event to eventdb
    $message = 'New Playlist: ' . $name . ' in category ' . $category;
    add_event('playlist', $message);
    
    $playlists = get_playlists_by_userid($userID);
    $other_playlists = get_playlists();
    include 'playlist_list.php';
    
} elseif ($action == 'show_playlists') {
    $playlists = get_playlists_by_userid($userID);
    $other_playlists = get_playlists();
    $user = get_user_by_id($userID);
    include 'playlist_list.php';
    
} elseif ($action == 'view_playlists_by_category') {
    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
    if ($category === NULL) {
        $category = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING);
    }
    $playlists = get_users_playlists_by_category($userID, $category);
    $other_playlists = get_all_playlists_by_category($category);
    include 'playlist_list.php';
    
} elseif ($action == 'delete_playlist') {
    $playlistID = filter_input(INPUT_POST, 'playlistID', FILTER_VALIDATE_INT);
    if ($playlistID === NULL) {
        $playlistID = filter_input(INPUT_GET, 'playlistID', FILTER_VALIDATE_INT);
    }
    // make sure user is owner
    $playlist = get_playlist_by_id($playlistID);
    if ($userID == $playlist['userID']) {
        // delete playlist from db
        delete_playlist($playlistID);
        // add event to eventdb
        $message = 'Playlist: ' . $playlist['name'] . ' in category ' . $playlist['category'] . ' removed.';
        add_event('playlist', $message);
    }
    $playlists = get_playlists_by_userid($userID);
    $other_playlists = get_playlists();
    include 'playlist_list.php';
    
}
?>
