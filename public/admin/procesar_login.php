<?php
declare(strict_types=1);
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit();
}

$mailLogin = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$claveLogin = filter_input(INPUT_POST, 'clave');

if ($mailLogin === '' || $claveLogin === '') {
    header("Location: login.php?error=2");
    exit();
}

$_SESSION['email'] = $mailLogin;

header("Location: home.php");
exit();

//Comence a hacer un login funcional hasta que vi que no hacia falta, por lo que lo dejo a medio hacer