<?php

# Connection settings
define('host', 'localhost');
define('user', 'root');
define('pass', '');
define('db',   'students');

# Connect to DB and executes query
function executeQuery($query='', $as_array=False) {

    # Check for query or return False
    if(!isset($query) or $query == '') return False;

    $link = mysqli_init();
    $link->real_connect(host, user, pass, db)
    or die('Ошибка подключения к Базе Данных: ' . $link->error);

    # Execute query
    $result = $link->query($query)
        or die('Ошибка выполнения запроса к Базе Данных! '.$link->error);

    if(!$result)
        die('Запрос вернул пустую строку'.$link->error);

    # Close connection
    $link->close();

    # Transform mysqli_result to associal array
    if($as_array) return $result->fetch_all(MYSQLI_ASSOC);
    else return $result;
};

function clean($value='') {

    # Check for variable
    if(!isset($value) or $value == '') return False;

    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
};

function message($message, $class='info', $location=''){

    # Check for message
    if(!isset($message) or $message == '') return False;

    session_start();

    if(!isset($_SESSION['messages'])) $_SESSION['messages'] = [];

    # Add message to session
    array_push($_SESSION['messages'], [
        'text'   => $message,
        'class'     => $class,
    ]);

    # Relocate user
    header('Location: /' . $location);
    die();
};

?>