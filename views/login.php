<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/connection.php");
session_start();

if(isset($_POST['signin'])){

    $login    = clean($_POST['login']);
    $password = clean($_POST['password']);
    
    # Check for POST data
    if(isset($login) && isset($password)){

        $query = sprintf('SELECT * FROM auth WHERE `ALogin` = \'%1$s\' AND `APassword` = \'%2$s\' LIMIT 1', $login, $password);
        # Get user from DB
        $user = executeQuery($query);

        # If user not found return error
        if(!$user) die('Пользователь не найден');

        # Save username in session
        $_SESSION['user'] = $user->fetch_assoc();
        
        # Relocate to homepage
        if(isset($_SESSION['user'])) header('Location: /');
    }
}

?>