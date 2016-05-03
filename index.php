<?php 
session_start(); 

require('model/database.php');
require('model/user_db.php');
require('model/song_db.php');
require 'model/playlist_db.php';
require 'model/playlistsong_db.php';
require 'model/event_db.php';

$path = $_SERVER['DOCUMENT_ROOT'] . '/momm/';
if (!isset($_SESSION['userID'])) {
    header('Location:user_manager/index.php') ;
} else {
    $userID = $_SESSION['userID'];
}

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_main'; // default action
    }
}

if ($action == 'search') {
    // get user input
    $search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
    // search songs
    $songs = search_songs($search);
    include 'view/results.php';
} elseif ($action == 'show_main') {
    $songs = get_songs();
    $popular_songs = get_popular_songs();
    $events = get_events_by_timestamp();
    $user = get_user_by_id($userID);
    if ($user['admin'] == 1) {
        include 'admin/view/main.php';
    } else {
        include 'view/main.php';
    }
    
}

?>
