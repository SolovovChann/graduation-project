<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/autorun.php');

# Get POST data and check if it's exsists
$class = clean($_POST['classId']);
if(!$class) message('Вы указали неверный класс', 'danger');

# Get response
if($class != "*")   $query = sprintf('SELECT * FROM students INNER JOIN classes ON students.CId = classes.CId WHERE students.CId= %1$s ORDER BY `SId`', $class);
else                $query = "SELECT * FROM students INNER JOIN classes ON students.CId = classes.CId WHERE 1 ORDER BY `SId`";

$result = executeQuery($query);
if(!$result) message('Студентов в этом классе не найдено', 'danger');

echo $twig->render('table.html', [
    'list' => $result,
    'currentYear' => date('Y'),
]);

?>