<?php

# Twig autoload
require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

# Connection to DataBase
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/connection.php');

# Start session
session_start();

# Register new Twig cfg
$loader = new \Twig\Loader\FilesystemLoader($_SERVER['DOCUMENT_ROOT'] . '/templates');
$twig = new \Twig\Environment($loader, [
    'autoescape'    => true,
    'debug'         => true,
    'cache'         => 'cache',
    'auto_reload'   => true,
]);

?>