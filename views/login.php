<?php

# Get executeQuery() clean() and message() functions
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/functions.php");
session_start();

# Get POST data
$login    = clean($_POST['login']);
$password = clean($_POST['password']);

# Check for data
if(!$login or !$password) message('Заполните все поля', 'danger');

# Get user from DB
$user = executeQuery(sprintf('SELECT * FROM auth WHERE `ALogin` = \'%1$s\' LIMIT 1', $login));

# If user not found return error
if(!isset($user)) message('Пользователь с таким логином и паролем не найден', 'danger');

# Transform to OBJECT array
$user = $user->fetch_object();

# Check password
if(!password_verify($password, $user->APassword)) message('Введён неверный пароль', 'danger');

# Save username in session
$_SESSION['user'] = $user;

message('Вы успешно авторизовались', 'success');

?>