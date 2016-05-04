<?php
session_start();

require('../model/database.php');
require('../model/user_db.php');
require('../model/song_db.php');
require '../model/playlist_db.php';
require '../model/playlistsong_db.php';
require '../model/event_db.php';

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_songs'; // fault action
    }
}

if (!isset($_SESSION['userID'])) {
    include 'user_manager/login.php';
} else {
    $userID = $_SESSION['userID'];
}

if ($action == 'show_add_song_form') {
    $user = get_user_by_id($userID);
    include 'song_add.php';
} elseif ($action == 'add_song') {

    $user = get_user_by_id($userID);
    
    // get form data
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $artist = filter_input(INPUT_POST, 'artist', FILTER_SANITIZE_STRING);
    $genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);
    
    // add user to database
    add_song($title, $artist, $genre);
    // add event to eventdb
    $message = 'New Song: ' . $title . ' by ' . $artist;
    add_event('song', $message);
    
    $songs = get_songs();
    include 'song_list.php';
} elseif ($action == 'list_songs') {
    $songs = get_songs();
    include 'song_list.php';
} elseif ($action == 'view_song') {

    $user = get_user_by_id($userID);
    
    $songID = filter_input(INPUT_POST, 'songID', FILTER_VALIDATE_INT);
    if ($songID === NULL) {
        $songID = filter_input(INPUT_GET, 'songID', FILTER_VALIDATE_INT);
    }
    $song = get_song_by_id($songID);
    $playlists = get_playlists_by_userid($userID);
    include 'song.php';
} elseif ($action == 'view_songs_by_artist') {
    $artist = filter_input(INPUT_POST, 'artist', FILTER_SANITIZE_STRING);
    if ($artist === NULL) {
        $artist = filter_input(INPUT_GET, 'artist', FILTER_SANITIZE_STRING);
    }
    $songs = get_songs_by_artist($artist);
    include 'song_list.php';
} elseif ($action == 'view_songs_by_genre') {
    $genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);
    if ($genre === NULL) {
        $genre = filter_input(INPUT_GET, 'genre', FILTER_SANITIZE_STRING);
    }
    $songs = get_songs_by_genre($genre);
    include 'song_list.php';
} elseif ($action == 'view_songs_in_order') { 
    $songs = get_songs_in_order();
    include ' view/main.php';
} elseif ($action == 'list_popular_songs') {
    $songs = get_songs();
    $popular_songs = get_popular_songs();
    include 'view/main.php';
} elseif ($action == 'add_song_to_playlist') {
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
    $playlists = get_playlists_by_userid($userID);
    $songs = get_songs();
    $song = get_song_by_id($songID);
    $playlist = get_playlist_by_id($playlistID);
    $playlistsongs = get_playlistsongs_by_playlistid($playlistID);
    include '../playlistsong_manager/playlist.php';
}
?>
