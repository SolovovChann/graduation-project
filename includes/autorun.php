<?php

# Connection to DataBase
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

# Symfony install
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; 

# Start session
session_start();

# Twig loader
$loader = new \Twig\Loader\FilesystemLoader($_SERVER['DOCUMENT_ROOT'] . '/templates');
$twig   = new \Twig\Environment($loader, [
    'cache' => $_SERVER['DOCUMENT_ROOT'] . '/cache',
    'debug' => false,
    'auto_reload' => true,
]);

?>