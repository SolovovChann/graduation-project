<?php

session_start();

# Get clean(), message() and executeQuery() functions
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

# Get data from POST
$login      = clean($_POST['login']);
$password   = clean($_POST['password']);
$passwordCheck = clean($_POST['passwordCheck']);

# Check for login and password
if(!$login or !$password or !$passwordCheck) message('Заполнены не все поля', 'danger');

# Compare passwords
if($password != $passwordCheck) message('Пароли не совпадают', 'danger');

# Get student from DB
$result = executeQuery(sprintf('SELECT `SId` FROM auth WHERE `ALogin` = \'%1$s\'', $login));
if(!isset($result) or $result == []) message('Пользователь с таким логином уже существует', 'danger');

# Hash password and unser second password
$password = password_hash($password, PASSWORD_DEFAULT);
unset($passwordCheck);

$result = executeQuery(sprintf('INSERT INTO auth(`ALogin`, `APassword`) VALUES (\'%1$s\', \'%2$s\')', $login, $password));

if(!$result) message('Не удалось создать запись в Базе Данных', 'danger');

# Authenticate user
$user = executeQuery(sprintf('SELECT * FROM auth WHERE `ALogin` = \'%1$s\' LIMIT 1', $login));
$user = $user->fetch_object();

$_SESSION['user'] = $user;

# Success message
message('Вы успешно зарегистрировались', 'success');

?>