<?php
require '../model/database.php';
require '../model/playlist_db.php';
require '../model/song_db.php';
require '../model/playlistsong_db.php';

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_add_playlistsong_form';
    }
}

if ($action == 'show_add_playlistsong_form') {
    $playlistID = filter_input(INPUT_POST, 'playlistID', FILTER_VALIDATE_INT);
    if ($playlistID === NULL) {
        $playlistID = filter_input(INPUT_GET, 'playlistID', FILTER_VALIDATE_INT);
    }
    $playlist = get_playlist_by_id($playlistID);
    $songs = get_songs();
    // need to change to get_playlists_by_userid();
    $playlists = get_playlists();
    include 'playlistsong_add.php';
} elseif ($action == 'add_playlistsong') {
    
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
    $playlists = get_playlists();
    $songs = get_songs();
    $playlistsongs = get_playlistsongs_by_playlistid($playlistID);
    include 'playlist.php';
} elseif ($action == 'show_playlistsongs') {
    $playlistID = filter_input(INPUT_POST, 'playlistID', FILTER_VALIDATE_INT);
    if ($playlistID === NULL) {
        $playlistID = filter_input(INPUT_GET, 'playlistID', FILTER_VALIDATE_INT);
    }
    $playlist = get_playlist_by_id($playlistID);
    $playlistsongs = get_playlistsongs_by_playlistid($playlistID);
//    foreach ($playlistsongs as $playlistsong) {
//        $song = get_song_by_id($playlistsong['songID']);
//    }
    include 'playlist.php';
}
