<?php

# Register common functions

function executeQuery($query="SELECT * FROM students WHERE 1"){

    # Input data
    $host = '127.0.0.1';
    $user = 'root';
    $pass = '';
    $db   = 'students';

    if(!isset($link)){
        # Create conntection to DB
        $link = mysqli_init();
        $link->real_connect($host, $user, $pass, $db)
        or die('Ошибка подключения к базе данных');
    }

    # Execute query
    $result = $link->query($query)
    or die('Ошибка выполения запроса: ' . $query . "<pre>" . $link->error. "</pre>");

    # Close connection
    $link->close();

    # Return of False
    return $result ?? False;
};

function resultToArray($query=Null){
    
    # Execute query and get MYSQLI_RESULT data (if $query is null call function w/o args)
    $result = isset($query) ? executeQuery($query) : executeQuery();

    # Transform MYSQLI_RESULT to common array
    while($row = $result->fetch_assoc()) $array[] = $row;

    # Return array or False
    return $array ?? False;
}

function clean($value=""){

    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    # Return False if value is empty
    return $value != "" ? $value : Null;
};

?>