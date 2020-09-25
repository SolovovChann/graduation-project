<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/connection.php');

# Get POST data or Null
$LastName   = clean($_POST['LastName']);
$FirstName  = clean($_POST['FirstName']);
$MidName    = clean($_POST['MidName']);
$BirthDate  = clean($_POST['BirthDate']);
$classId    = clean($_POST['classId']);

# Check the completion of all fields
if(!$LastName || !$FirstName || !$MidName || !$BirthDate || !$classId)
    die('Вы ввели не все данные');

# Create query
$query = sprintf('SELECT * FROM students WHERE
    `SLastName` = \'%1$s\' AND `SFirstName` = \'%2$s\' AND `SMidName` = \'%3$s\' AND `SBirthDate` = \'%4$s\' LIMIT 1',
    $LastName, $FirstName, $MidName, $BirthDate
);

# Check for FIO and BirthDate duplicate
$result = executeQuery($query);
if($result->num_rows > 0) die('Студент с таким ФИО и датой рождения уже есть в Базе данных');

# Create query
$query = sprintf('INSERT INTO
    students(`SLastName`, `SFirstName`, `SMidName`, `SBirthDate`, `CId`) VALUES(\'%1$s\', \'%2$s\', \'%3$s\', \'%4$s\', \'%5$d\')',
    $LastName, $FirstName, $MidName, $BirthDate, $classId
);
$result = executeQuery($query);


if(!isset($result)) die('Не удалось создать новую запись');

# Return updated table
$result = executeQuery("SELECT * FROM students INNER JOIN classes ON students.CId = classes.CId WHERE 1 ORDER BY `SId`");
if(!$result) die('Невозможно обновить Базу данных');

?>

<?php foreach($result as $column): ?>

    <tr>
        <th scope="row"><?= $column['SId'] ?></th>
        <td><?= $column['SLastName'] ?></td>
        <td><?= $column['SFirstName'] ?></td>
        <td><?= $column['SMidName'] ?></td>
        <td><?= $column['SBirthDate'] ?></td>
        <td><?= date("Y") - $column['CLevel'] . ' "' . $column['Cletter'] . '"'?></td>
    </tr>

<?php endforeach; ?>