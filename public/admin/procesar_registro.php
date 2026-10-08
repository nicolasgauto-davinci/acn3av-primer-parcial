<?php
declare(strict_types=1);
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {    //Si el request no viene de POST, vuelve al login
    header("Location: login.php");
    exit();
}

$mail = filter_input(INPUT_POST, 'nuevo_mail', FILTER_SANITIZE_EMAIL);
$clave = filter_input(INPUT_POST, 'nueva_clave');
$claveRepetida = filter_input(INPUT_POST, 'confirmar_clave');

if ($clave !== $claveRepetida) {
    header("Location: register.php?error=1");
    exit();
}

header("Location: login.php");
exit();

////Comence a hacer un registro funcional hasta que vi que no hacia falta, por lo que lo dejo a medio hacer