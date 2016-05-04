<?php
session_start();

require('../model/database.php');
require('../model/user_db.php');
require '../model/playlist_db.php';
require '../model/song_db.php';
require '../model/playlistsong_db.php';
require '../model/event_db.php';


$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        if (!isset($_SESSION['userID'])) {
            $action = 'show_login_form'; // fault action
        }
    }
}

if ($action == 'show_login_form') {
    include 'login.php';
} elseif ($action == 'register_user') {
    
    // get registration form data
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $passwordcopy = filter_input(INPUT_POST, 'passwordcopy', FILTER_SANITIZE_STRING);
    
    // check if passwords match
    if ($password == $passwordcopy) {
        // add user to database
        add_user($name, $email, $password);
        include 'login.php';
    } else {
        $error_message = 'Passwords do not match, try again.';
        include 'login.php';
        include '../errors/error.php';
    }
    
} elseif ($action == 'login_user') {
    
    // get login form data
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    
    // get user from database
    $user = get_user_by_email($email);
    
    if ($user == false) {
        $error_message = "Email/password pair not found. Try again.";
        include 'login.php';
        include '../errors/error.php';
    } else {
        // create persistent cookie
        $lifetime = 60 * 60 * 24 * 14; // 2 weeks
        session_set_cookie_params($lifetime);
        setcookie('userID', $user['userID'], $lifetime);
        setcookie('email', $email, $lifetime);
        setcookie('password', $password, $lifetime);
        session_start();
        $_SESSION['userID'] = $user['userID'];
        print_r($_SESSION);
        print_r($_SESSION['userID']);
        header('Location:../index.php');
    }
} elseif ($action == 'logout_user') {
    session_unset();
    session_destroy();
    include 'login.php';
} elseif ($action == 'view_user') {
    $userID = $_SESSION['userID'];
    $user = get_user_by_id($userID);
    include 'user.php';
} elseif ($action == 'change_password') {
    $userID = $_SESSION['userID'];
    $user = get_user_by_id($userID);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $passwordcopy = filter_input(INPUT_POST, 'passwordcopy', FILTER_SANITIZE_STRING);
    
    // check if passwords match
    if ($password == $passwordcopy) {
        // change password in database
        $result = change_password($userID, $password);
        $user = get_user_by_id($userID);
        include 'user.php';
    } else {
        $error_message = 'Passwords do not match, try again.';
        include 'user.php';
        include '../errors/error.php';
    }
}
?>