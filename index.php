<?php

# All needed files already connected inside
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/autorun.php");

$student_list   = resultToArray("SELECT *  FROM students INNER JOIN classes ON students.CId=classes.CId GROUP BY `SId`");
$class_list     = resultToArray("SELECT * FROM classes");

# Return render with paramethers
echo $twig->render('index.html', [

    'title'     => 'Главная страница',
    'user'      => $_SESSION['user'],
    'students'  => $student_list,
    'classes'   => $class_list,
    'currentYear' => date("Y"),
]);

?>