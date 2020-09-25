<?php

session_start();

# Delete user from session
unset($_SESSION['user']);
session_destroy();

# If user deleted relocate to homepage
if(!$_SESSION['user']) header('Location: /');

# Raise error if not
else die('Выход из системы выполнен не был!');

?>