<?php
session_start();

require('../../model/database.php');
require '../../model/song_db.php';
require('../../model/playlist_db.php');
require('../../model/playlistsong_db.php');
require '../../model/user_db.php';

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

if (!isset($_SESSION['userID'])) {
    include 'user_manager/login.php';
} elseif ($action == 'show_add_playlist_form') {
//    $userID = filter_input(INPUT_POST, 'userID', FILTER_VALIDATE_INT);
//    if ($userID === NULL) {
//        $userID = filter_input(INPUT_GET, 'userID', FILTER_VALIDATE_INT);
//    }
    $user = get_user_by_id($userID);
    $songs = get_songs();
    include 'playlist_add.php';
} elseif ($action == 'add_playlist') {
    
    // get form data
//    $userID = filter_input(INPUT_POST, 'userID', FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
    
    // add user to database
    add_playlist($userID, $name, $category);
    $playlists = get_playlists_by_userid($userID);
    include 'playlist_list.php';
} elseif ($action == 'show_playlists') {
    // get user data
//    $userID = filter_input(INPUT_POST, 'userID', FILTER_VALIDATE_INT);
//    if ($userID === NULL) {
//        $userID = filter_input(INPUT_GET, 'userID', FILTER_VALIDATE_INT);
//    }
    $playlists = get_playlists_by_userid($userID);
//    $playlists = get_playlists();
    $user = get_user_by_id($userID);
    include 'playlist_list.php';
    include 'playlist_add.php';
} elseif ($action == 'show_all_playlists') {
//    $userID = filter_input(INPUT_POST, 'userID', FILTER_VALIDATE_INT);
//    if ($userID === NULL) {
//        $userID = filter_input(INPUT_GET, 'userID', FILTER_VALIDATE_INT);
//    }
    $user = get_user_by_id($userID);
    
    $playlists = get_playlists();
    include 'playlist_list.php';
}
?>
