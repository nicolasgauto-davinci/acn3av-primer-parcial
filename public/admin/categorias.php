<?php
declare(strict_types=1);
session_start();

require_once '../../app/includes/database.php';

//tengo que agregar que tambien filtre que el perfil sea admin
if(!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}



?>