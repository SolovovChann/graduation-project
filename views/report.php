<?php

# All needed files already connected inside
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/autorun.php");

$report_theme = clean($_POST['report']);

switch ($report_theme) {
    case 'the_youngest_first_grader':
        $query = "SELECT * FROM students
        INNER JOIN classes ON students.CId=classes.CId
        WHERE
        students.SBirthDate = (SELECT MAX(SBirthDate) FROM students INNER JOIN classes ON students.CId=classes.CId WHERE classes.CLevel = 2019 )
        AND
        classes.CLevel=2019";
        break;
    
    case 'number_of_second_graders':
        $query = "SELECT *
        FROM students
        INNER JOIN classes ON students.CId=classes.CId
        WHERE classes.CLevel=2018";
        break;

    case 'birthday_people_in_July':
        $query = "SELECT *
        FROM students
        INNER JOIN classes ON students.CId=classes.CId
        WHERE SBirthDate LIKE '%-07-%'";
        break;
    
    default:
        message('Вы не ввели тему');
        break;
};

$student_list = executeQuery($query, True);

# Return render with paramethers
echo $twig->render('report.html', [
    'title'     => 'Отчёт',
    'theme'     => $reportTheme,
    'query'     => $query,
    'user'      => $_SESSION['user'],
    'list'      => $student_list,
    'currentYear' => date("Y"),
]);

?>