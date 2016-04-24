<?php
require('../model/database.php');
require('../model/user_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if (action === NULL) {
        $action = 'show_login_form'; // fault action
    }
}

if ($action == 'show_login_form') {
    
} elseif ($action == 'register_user') {
    
    // get registration form data
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    
    add_user($name, $email, $password);
} elseif ($action == 'login_user') {
    
}
?>