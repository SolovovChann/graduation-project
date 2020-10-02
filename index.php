<?php

# All needed files already connected inside
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/autorun.php");

$list    = executeQuery('SELECT students.*, classes.CLevel, classes.Cletter FROM students INNER JOIN classes ON students.CId = classes.CId ORDER BY students.SId', True);
$classes = executeQuery('SELECT * FROM classes', True);

echo $twig->render('index.html', [
    'title'     => 'Главная страница',
    'user'      => $_SESSION['user'],
    'messages'  => $_SESSION['messages'],

    'list'      => $list,
    'classes'   => $classes,
    'currentYear' => date('Y'),
]);

# Clear messages
$_SESSION['messages'] = [];

?>