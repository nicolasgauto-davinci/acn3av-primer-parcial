<?php
declare(strict_types=1);
session_start();

require_once '../../app/includes/database.php';

$ver_subcat = isset($_GET['ver']) ? (int) $_GET['ver'] : null;
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
        <h1>Gestión de Categorías</h1>
        <section>
            <table>
                <thead>
                    <tr>
                        <th>Categoría</th>
                        <th>🖉</th>
                        <th>Activo</th>
                        <th>Ver subcategorias</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listaCategorias as $categoria) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($categoria["nombre"]) . "</td>";
                        echo "<td><a href='procesar_categoria.php?id=" . $categoria["id"] . "'>🖉</a></td>";
                        echo "<td><input type='checkbox' " . ($categoria["activo"] ? "checked" : "") . " disabled></td>";
                        echo "<td>";
                        if ($ver_subcat === $categoria['id']){
                            echo "<a href='categorias.php'>Ocultar subcategorías</a>";
                        } else {
                            echo "<a href='categorias.php?ver=" . $categoria['id'] . "'>Ver subcategorías</a>";
                        }
                        echo "</td>";
                        echo "</tr>";
                        if ($ver_subcat === $categoria['id'] && ($categoria['subcategorias']) !== null){
                            foreach ($categoria['subcategorias'] as $subcat){
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($subcat["nombre"]) . "</td>";
                                echo "<td><a href='procesar_categoria.php?id=" . $subcat['id'] . "'>🖉</a></td>";
                                echo "<td><input type='checkbox' " . ($subcat["activo"] ? "checked" : "") . " disabled></td>";
                                echo "<td></td>";
                                echo "</tr>";
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <h1>Creación de Categorías</h1>
        <section>
            <form action="procesar_categoria.php" method="post">
                <label for="categoriaPadre">Categoria Padre:</label>
                <select name="categoriaPadre">
                    <option>Nueva categoria padre</option>
                    <?php
                    foreach ($listaCategorias as $categoria) {
                        echo "<option>" . htmlspecialchars($categoria['nombre']) . "</option>";
                    }
                    ?>
                </select>
                <br>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required>
                <br>
                <button type="submit" class="procesar">Crear categoría</button>
            </form>
        </section>
    </main>
    <?php include_once '../../app/includes/footer_admin.php'; ?>
</body>
</html>