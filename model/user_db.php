<?php

/*
 * by meredith browne
 */

function add_user($name, $email, $password) {
    global $db;
    $query = "INSERT INTO users (name, email, password) "
            . "VALUES (:name, :email, :password)";    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        error_log("DB Error: " . $error_message);
        display_db_error($error_message);
    }
}

function get_user_by_id($userID) {
    global $db;
    $query = 'SELECT * FROM users
              WHERE userID = :userID';
    $statement = $db->prepare($query);
    $statement->bindValue(":userID", $userID);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}

function get_user_by_email($email) {
    global $db;
    $query = 'SELECT * FROM users '
            . 'WHERE email = :email';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $user = $statement->fetch();
        $statement->closeCursor();
        return $user;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        error_log("DB Error: " . $error_message);
        display_db_error($error_message);
    }
    
}

function get_users() {
    global $db;
    $query = 'SELECT * FROM users';
    $statement = $db->prepare($query);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
    return $users;
}

function delete_user($userID) {
    global $db;
    $query = 'DELETE FROM users
              WHERE userID = :userID';
    $statement = $db->prepare($query);
    $statement->bindValue(':userID', $userID);
    $statement->execute();
    $statement->closeCursor();
}

function change_password($userID, $password) {
    global $db;
    $query = 'UPDATE users '
            . 'SET password = :password '
            . 'WHERE userID = :userID';
    $statement = $db->prepare($query);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':userID', $userID);
    $statement->execute();
    $statement->closeCursor();
    return $statement;
}

?>