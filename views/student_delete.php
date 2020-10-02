<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$id = clean($_GET['id']);

executeQuery(sprintf('DELETE FROM students WHERE `SId` =  \'%1$s\'', $id));
message('Студент успешно удалён', 'success');

?>