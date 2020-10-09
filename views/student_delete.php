<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
session_start();

if(!isset($_SERVER['user'])) message('Вы не авторизованы', 'danger');

$id = clean($_GET['id']);

# Existing check
$result = executeQuery(sprintf('SELECT `SId` FROM students WHERE `SId` = \'%1$s\'', $id), true);
if(!isset($result) or $result == []) message('Пользователь с таким ID не найден');

executeQuery(sprintf('DELETE FROM students WHERE `SId` =  \'%1$s\'', $id));
message('Студент успешно удалён', 'success');

?>