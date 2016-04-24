<?php
require('../model/database.php');
require('../model/user_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_login_form'; // fault action
    }
}

if ($action == 'show_login_form') {
    include 'login.php';
} elseif ($action == 'register_user') {
    
    // get registration form data
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    
    // add user to database
    add_user($name, $email, $password);
    include 'login.php';
} elseif ($action == 'login_user') {
    
    // get login form data
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    
    // get user from database
    get_user_by_email($email);
    include '../index.php';
}
?>