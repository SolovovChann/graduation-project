<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/connection.php');

# Get POST data and check if it's exsists
$class = clean($_POST['classId']) ?: Null;
if(!$class) die('Вы указали неверный класс');

# Get response
if($class != "*")   $query = sprintf('SELECT * FROM students INNER JOIN classes ON students.CId = classes.CId WHERE students.CId= %1$s ORDER BY `SId`', $class);
else                $query = "SELECT * FROM students INNER JOIN classes ON students.CId = classes.CId WHERE 1 ORDER BY `SId`";

$result = executeQuery($query);
if(!$result) die();

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