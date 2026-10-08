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
    <h1>Gestión de Perfiles</h1>
    <table>
        <thead>
            <tr>
                <th>Email</th>
                <th>Permisos</th>
                <th>🖉</th>
                <th>Activo</th>
            </tr>

        </thead>
        <tbody>
            <?php
            foreach ($listaUsuarios as $usuario) {
                if (in_array('admin', $usuario['permisos']) || in_array('superadmin', $usuario['permisos'])) {
                    echo "<tr>";
                    echo "<td>" . $usuario["email"] . "</td>";
                    echo "<td>" . implode(", ", $usuario["permisos"]) . "</td>";
                    echo "<td><a href='editar_perfil.php?id=" . $usuario["id"] . "'>🖉</a></td>";
                    echo "<td><input type='checkbox' " . ($usuario["activo"] ? "checked" : "") . " disabled></td>";
                    echo "</tr>"; // Saltar usuarios con permisos de admin o superadmin
                }
            }
            ?>
        </tbody>
    </table>
    <h1>Creación de Perfiles</h1>
    <form action="editar_perfil.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <fieldset>
            <legend>Permisos</legend>
            <label><input type="checkbox" name="permisos[]" value="superadmin"> superadmin</label><br>
            <label><input type="checkbox" name="permisos[]" value="admin"> admin</label><br>
            <label><input type="checkbox" name="permisos[]" value="categorias"> categorias</label><br>
            <label><input type="checkbox" name="permisos[]" value="marcas"> marcas</label><br>
            <label><input type="checkbox" name="permisos[]" value="comentarios"> comentarios</label><br>
            <label><input type="checkbox" name="permisos[]" value="productos"> productos</label><br>
            <label><input type="checkbox" name="permisos[]" value="usuarios"> usuarios</label><br>
            <label><input type="checkbox" name="permisos[]" value="perfiles"> perfiles</label>
        </fieldset>

        <button type="submit">Crear perfil</button>
    </form>

</body>
</html>