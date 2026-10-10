<?php
declare(strict_types=1);
session_start();

require_once '../../app/includes/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include_once '../../app/includes/header_admin.php'; ?>
    <main>
        <h1>Panel de Administración</h1>
        <p>Bienvenido, <?php echo htmlspecialchars($_SESSION['email']); ?>!</p>
        <section class="grid-admin-home">
            <a href="./productos.php">Administrar Productos</a><br>
            <a href="./categorias.php">Administrar Categorías</a><br>
            <a href="./marcas.php">Administrar Marcas</a><br>
            <a href="./usuarios.php">Administrar Usuarios</a><br>
            <a href="./perfiles.php">Administrar Perfiles</a>
        </section>
    </main>
    <?php include_once '../../app/includes/footer_admin.php'; ?>
</body>
</html>