<?php

# All needed files already connected inside
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/autorun.php");

$reportTheme = clean($_POST['report']);

if($reportTheme == "the_youngest_first_grader") $query = "SELECT * FROM students
INNER JOIN classes ON students.CId=classes.CId
WHERE
students.SBirthDate = (SELECT MAX(SBirthDate) FROM students INNER JOIN classes ON students.CId=classes.CId WHERE classes.CLevel = 2019 )
AND
classes.CLevel=2019";

else if($reportTheme == "number_of_second_graders") $query = "SELECT *
FROM students
INNER JOIN classes ON students.CId=classes.CId
WHERE classes.CLevel=2018";

else if($reportTheme == "birthday_people_in_July") $query = "SELECT *
FROM students
INNER JOIN classes ON students.CId=classes.CId
WHERE SBirthDate LIKE '%-07-%'";

$student_list = resultToArray($query);

# Return render with paramethers
echo $twig->render('report.html', [
    'title'     => 'Отчёт',
    'theme'     => $reportTheme,
    'query'     => $query,
    'user'      => $_SESSION['user'],
    'students'  => $student_list,
    'currentYear' => date("Y"),
]);

?>