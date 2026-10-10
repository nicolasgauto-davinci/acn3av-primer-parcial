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
        <section>
            <h1>Gestión de Marcas</h1>
            <table>
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>🖉</th>
                    <th>Activo</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($listaMarcas as $marca) {
                    echo "<tr>";
                    echo "<td>" . $marca['nombre'] . "</td>";
                    echo "<td><a href='editar_marca.php?id=" . $marca['id'] . "'>🖉</a></td>";
                    echo "<td><input type='checkbox' " . ($marca["activo"] ? "checked" : "") . " disabled></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        </section>
        <section>
            <h1>Creación de Marcas</h1>
            <form action="editar_marca.php" method="POST">
                <label for="nombre">Nombre:</label><br>
                <input type="text" name="nombre" required><br>
                <button type="submit" class="procesar">Crear marca</button>
            </form>
        </section>
        
    </main>
    <?php include_once '../../app/includes/footer_admin.php'; ?>
</body>
</html>