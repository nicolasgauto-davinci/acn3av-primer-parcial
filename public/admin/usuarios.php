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
        <h1>Gestión de Usuarios</h1>
        <section>
            <table>
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>🖉</th>
                        <th>Activo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listaUsuarios as $usuario) {        
                        echo "<tr>";
                        echo "<td>" . $usuario['email'] . "</td>";
                        echo "<td><a href='procesar_usuario.php?id=" . $usuario["id"] . "'>🖉</a></td>";
                        echo "<td><input type='checkbox' " . ($usuario["activo"] ? "checked" : "") . " disabled></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <h1>Creación de Usuarios</h1>
        <section>
            <form action="procesar_usuario.php" method="POST"></form>
            <label for="nombre">Nombre:</label><br>
            <input type="text" name="nombre" required><br>
            <label for="email">Email:</label><br>
            <input type="email" name="email" required><br>
            <label for="clave">Clave:</label><br>
            <input type="password" name="clave" required><br>
            <label for="perfil">Nombre de perfil:</label><br>
            <input type="text" name="perfil" required><br>
            <button type="submit" class="procesar">Crear usuario</button>
        </section>
    </main>
    <?php include_once '../../app/includes/footer_admin.php'; ?>
</body>
</html>