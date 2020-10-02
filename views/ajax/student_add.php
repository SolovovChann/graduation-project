<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/autorun.php');

# Get POST data or Null
$LastName   = clean($_POST['LastName']);
$FirstName  = clean($_POST['FirstName']);
$MidName    = clean($_POST['MidName']);
$BirthDate  = clean($_POST['BirthDate']);
$classId    = clean($_POST['classId']);

# Check the completion of all fields
if(!$LastName || !$FirstName || !$MidName || !$BirthDate || !$classId)
    message('Вы ввели не все данные', 'danger');

# Create query
$query = sprintf('SELECT * FROM students WHERE
    `SLastName` = \'%1$s\' AND `SFirstName` = \'%2$s\' AND `SMidName` = \'%3$s\' AND `SBirthDate` = \'%4$s\' LIMIT 1',
    $LastName, $FirstName, $MidName, $BirthDate
);

# Check for FIO and BirthDate duplicate
$result = executeQuery($query);
if($result->num_rows > 0) message('Студент с таким ФИО и датой рождения уже есть в Базе данных', 'danger');

# Create query
$query = sprintf('INSERT INTO
    students(`SLastName`, `SFirstName`, `SMidName`, `SBirthDate`, `CId`) VALUES(\'%1$s\', \'%2$s\', \'%3$s\', \'%4$s\', \'%5$d\')',
    $LastName, $FirstName, $MidName, $BirthDate, $classId
);
$result = executeQuery($query);


if(!isset($result)) message('Не удалось создать новую запись', 'danger');

# Return updated table
$result = executeQuery("SELECT * FROM students INNER JOIN classes ON students.CId = classes.CId WHERE 1 ORDER BY `SId`");
if(!$result) message('Невозможно обновить Базу данных', 'danger');

echo $twig->render('table.html', [
    'list' => $result,
    'currentYear' => date('Y'),
]);

?>