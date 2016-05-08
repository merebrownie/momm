<?php

/* 
 * by meredith browne
 */

session_start();

require '../../model/database.php';
require '../../model/playlist_db.php';
require '../../model/song_db.php';
require '../../model/playlistsong_db.php';
require '../../model/user_db.php';
require '../../model/event_db.php';

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
    $user = get_user_by_id($userID);
}

if ($action == 'show_add_playlistsong_form') {
    
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
    
    // make sure user is owner or admin
    $playlist = get_playlist_by_id($playlistID);
    $song = get_song_by_id($songID);
    if ($userID == $playlist['userID'] || $user['admin'] == 1) {
        // add playlist song to db
        add_playlistsong($playlistID, $songID);
        // log event
        if ($user['admin'] == 1) {
            $message = $song['title'] . ' by ' . $song['artist'] . ' added to ' . $playlist['name'] . ' by Admin.';
        } else {
            $message = $song['title'] . ' by ' . $song['artist'] . ' added to ' . $playlist['name'] . ' by ' . $user['name'];
        }
        add_event('playlistsong', $message);
        $playlists = get_playlists();
        $songs = get_songs();
        $playlistsongs = get_playlistsongs_by_playlistid($playlistID);
        include 'playlist.php';
    } else {
        $error_message = 'Must be owner to edit playlist.';
        include '../errors/error.php';
    }
    
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

    
} elseif ($action == 'delete_playlistsong') {
    $playlists = get_playlists_by_userid($userID);
    
    $playlistID = filter_input(INPUT_POST, 'playlistID', FILTER_VALIDATE_INT);
    if ($playlistID === NULL) {
        $playlistID = filter_input(INPUT_GET, 'playlistID', FILTER_VALIDATE_INT);
    }
    
    $songID = filter_input(INPUT_POST, 'songID', FILTER_VALIDATE_INT);
    if ($songID === NULL) {
        $songID = filter_input(INPUT_GET, 'songID', FILTER_VALIDATE_INT);
    }
    
    // make sure playlist belongs to user or user is admin
    $playlist = get_playlist_by_id($playlistID);
    $song = get_song_by_id($songID);
    if ($playlist['userID'] == $userID || $user['admin'] == 1) {
        // delete playlistsong from db
        delete_playlistsong($playlistID, $songID);
        // log event in eventdb
        if ($user['admin'] == 1) {
            $message = $song['title'] . ' by ' . $song['artist'] . ' removed from ' . $playlist['name'] . ' by Admin.';
        } else {
            $message = $song['title'] . ' by ' . $song['artist'] . ' removed from ' . $playlist['name'] . ' by ' . $user['name'];
        }
        
        add_event('playlistsong', $message);
        $songs = get_songs();
        $playlistsongs = get_playlistsongs_by_playlistid($playlistID);
        include 'playlist.php';
    }
}