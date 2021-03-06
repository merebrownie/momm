<?php

/* 
 * by meredith browne
 */

session_start();

require('../../model/database.php');
require('../../model/user_db.php');
require('../../model/song_db.php');
require '../../model/playlist_db.php';
require '../../model/playlistsong_db.php';
require '../../model/chart_db.php';
require '../../model/event_db.php';

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
    $user = get_user_by_id($userID);
}

if ($action == 'show_add_song_form') {
    $user = get_user_by_id($userID);
    include 'song_add.php';
    
} elseif ($action == 'add_song') {

    // get form data
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $artist = filter_input(INPUT_POST, 'artist', FILTER_SANITIZE_STRING);
    $genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);
    
    // check if genre entered
    if ($genre == '') {
        // add user to db
        add_song($title, $artist, 'None');
    } else {
        // add user to database
        add_song($title, $artist, $genre);
    }
    // add event to db
    $message = 'New Song: ' . $title . ' by ' . $artist . '.';
    add_event('song', $message);
    $songs = get_songs();
    $xml = get_top_tracks_xml();
    include 'song_list.php';
    
} elseif ($action == 'add_song_from_playlist') {
    // get form data
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $artist = filter_input(INPUT_POST, 'artist', FILTER_SANITIZE_STRING);
    $genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);
    $playlistID = filter_input(INPUT_POST, 'playlistID', FILTER_SANITIZE_NUMBER_INT);
    // check if genre entered
    if ($genre == '') {
        // add user to db
        add_song($title, $artist, 'None');
    } else {
        // add user to database
        add_song($title, $artist, $genre);
    }
    
    // add event to eventdb
    $message = 'New Song: ' . $title . ' by ' . $artist . '.';
    add_event('song', $message);
    
    $songs = get_songs();
    $xml = get_top_tracks_xml();
    $playlist = get_playlist_by_id($playlistID);
    $playlistsongs = get_playlistsongs_by_playlistid($playlistID);
    include '../playlistsong_manager/playlist.php';
    
} elseif ($action == 'list_songs') {
    $songs = get_songs();
    $xml = get_top_tracks_xml();
    include 'song_list.php';
    
} elseif ($action == 'view_song') {    
    $songID = filter_input(INPUT_POST, 'songID', FILTER_VALIDATE_INT);
    if ($songID === NULL) {
        $songID = filter_input(INPUT_GET, 'songID', FILTER_VALIDATE_INT);
    }
    $song = get_song_by_id($songID);
    $playlists = get_playlists();
    include 'song.php';
    
} elseif ($action == 'view_songs_by_artist') {
    $artist = filter_input(INPUT_POST, 'artist', FILTER_SANITIZE_STRING);
    if ($artist === NULL) {
        $artist = filter_input(INPUT_GET, 'artist', FILTER_SANITIZE_STRING);
    }
    $songs = get_songs_by_artist($artist);
    $xml = get_top_tracks_xml();
    include 'song_list.php';
    
} elseif ($action == 'view_songs_by_genre') {
    $genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);
    if ($genre === NULL) {
        $genre = filter_input(INPUT_GET, 'genre', FILTER_SANITIZE_STRING);
    }
    $songs = get_songs_by_genre($genre);
    $xml = get_top_tracks_xml();
    include 'song_list.php';
    
} elseif ($action == 'delete_song') {
    $songID = filter_input(INPUT_POST, 'songID', FILTER_VALIDATE_INT);
    if ($songID === NULL) {
        $songID = filter_input(INPUT_GET, 'songID', FILTER_VALIDATE_INT);
    }    
    // make sure user is admin
    if ($user['admin'] == 1) {
        
        // remove song from playlists
        $playlists = get_playlists();
        foreach ($playlists as $playlist) {
            $playlistsongs = get_playlistsongs_by_playlistid($playlist['playlistID']);
            foreach ($playlistsongs as $playlistsong) {
                if ($playlistsong['songID'] == $songID) {
                    // delete playlistsong from playlistsong db
                    delete_playlistsong($playlist['playlistID'], $songID);
                }
            }
        }
        
        // add event to event db
        $song = get_song_by_id($songID);
        $message = 'Song: ' . $song['title'] . ' by ' . $song['artist'] . ' removed by Admin.';
        add_event('song', $message);
        
        // delete song from songdb
        delete_song($songID);
       
    }
    $songs = get_songs();
    $xml = get_top_tracks_xml();
    include 'song_list.php';
    
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
    $playlists = get_playlists();
    $songs = get_songs();
    $song = get_song_by_id($songID);
    $playlist = get_playlist_by_id($playlistID);
    $playlistsongs = get_playlistsongs_by_playlistid($playlistID);
    $message = $song['title'] . ' by ' . $song['artist'] . ' added to ' . $playlist['name'] . ' by Admin.'; 
    add_event('playlistsong', $message);
    $xml = get_top_tracks_xml();
    include '../playlistsong_manager/playlist.php';
    
} elseif ($action == 'get_top_songs') {
    $xml = get_top_tracks_xml();
    include 'top_songs.php';
}
?>
