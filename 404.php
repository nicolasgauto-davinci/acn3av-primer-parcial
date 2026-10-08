<?php
declare(strict_types=1);
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include_once './app/includes/header_public.php'; ?>
    <main>
        <h1>ERROR 404</h1>
        <p>La página que busca no existe.</p>
        <a href="./public/home.php">Volver al inicio</a>
    </main>
</body>
</html>