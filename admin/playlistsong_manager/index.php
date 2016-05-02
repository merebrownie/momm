<?php
session_start();

require '../../model/database.php';
require '../../model/playlist_db.php';
require '../../model/song_db.php';
require '../../model/playlistsong_db.php';
require '../../model/user_db.php';

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_add_playlistsong_form';
    }
}

if (!isset($_SESSION['userID'])) {
    include 'user_manager/login.php';
}  else {
    $userID = $_SESSION['userID'];
}

if ($action == 'show_add_playlistsong_form') {

    $user = get_user_by_id($userID);
    
    $playlistID = filter_input(INPUT_POST, 'playlistID', FILTER_VALIDATE_INT);
    if ($playlistID === NULL) {
        $playlistID = filter_input(INPUT_GET, 'playlistID', FILTER_VALIDATE_INT);
    }
    $playlist = get_playlist_by_id($playlistID);
    $songs = get_songs();
    $playlists = get_playlists_by_userid($userID);
    include 'playlistsong_add.php';
} elseif ($action == 'add_playlistsong') {

    $user = get_user_by_id($userID);
    
    $playlistID = filter_input(INPUT_POST, 'playlistID', FILTER_VALIDATE_INT);
    if ($playlistID === NULL) {
        $playlistID = filter_input(INPUT_GET, 'playlistID', FILTER_VALIDATE_INT);
    }
    
    $songID = filter_input(INPUT_POST, 'songID', FILTER_VALIDATE_INT);
    if ($songID === NULL) {
        $songID = filter_input(INPUT_GET, 'songID', FILTER_VALIDATE_INT);
    }
    add_playlistsong($playlistID, $songID);
    $playlist = get_playlist_by_id($playlistID);
    // need to change to get_playlists_by_userid();
    $playlists = get_playlists_by_userid($userID);
    $songs = get_songs();
    $playlistsongs = get_playlistsongs_by_playlistid($playlistID);
    include 'playlist.php';
    include 'playlistsong_add.php';
} elseif ($action == 'show_playlistsongs') {
    
    $user = get_user_by_id($userID);
    
    $playlistID = filter_input(INPUT_POST, 'playlistID', FILTER_VALIDATE_INT);
    if ($playlistID === NULL) {
        $playlistID = filter_input(INPUT_GET, 'playlistID', FILTER_VALIDATE_INT);
    }
    $playlist = get_playlist_by_id($playlistID);
    $playlistsongs = get_playlistsongs_by_playlistid($playlistID);
    $songs = get_songs();
    include 'playlist.php';
    include 'playlistsong_add.php';
} elseif ($action == 'delete_playlistsong') {
    $playlistID = filter_input(INPUT_POST, 'playlistID', FILTER_VALIDATE_INT);
    if ($playlistID === NULL) {
        $playlistID = filter_input(INPUT_GET, 'playlistID', FILTER_VALIDATE_INT);
    }
    $playlist = get_playlist_by_id($playlistID);
    $playlistsongs = get_playlistsongs_by_playlistid($playlistID);
    $songs = get_songs();
    include 'playlist.php';
    include 'playlistsong_add.php';
}
