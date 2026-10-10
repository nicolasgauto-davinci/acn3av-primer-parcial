<?php
declare(strict_types=1);
session_start();

require_once '../../app/includes/database.php';

$catPadreSel = null;
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categoriaPadre'])){
    if($_POST['categoriaPadre'] !== null){
        $catPadreSel = (int) $_POST['categoriaPadre'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/global.css">
</head>
<body>
    <?php include_once '../../app/includes/header_admin.php'; ?>
    <main>
        <h1>Gestión de Productos</h1>
        <section>
            <table class="tablaProductos">
            <thead>
                <tr>
                    <th>IMG</th>
                    <th>Producto</th>
                    <th>🖉</th>
                    <th>Activo</th>
                    <th>Comentarios</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listaProductos as $producto) {
                    echo "<tr>";
                    echo "<td><img src='" . $producto["imagenAdmin"] . "' alt='" . $producto["nombre"] . "'></td>";
                    echo "<td>" . $producto["nombre"] . "</td>";
                    echo "<td><a href='editar_producto.php?id=" . $producto["id"] . "'>🖉</a></td>";
                    echo "<td><input type='checkbox' " . ($producto["activo"] ? "checked" : "") . " disabled></td>";
                    echo "<td><a href='comentarios.php?id=" . $producto["id"] . "'>Ver Comentarios</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        </section>

        <h1>Creación de Productos</h1>
        <section>
            <form action="editar_producto.php" method="post" enctype="multipart/form-data">
            <label for="categoriaPadre">Categoría padre:</label><br>
            <select name="categoriaPadre" required>
                <option>Seleccionar categoría padre</option>
                <?php 
                foreach ($listaCategorias as $categoriaPadre) {
                    $selected = ($catPadreSel === $categoriaPadre['id']) ? 'selected' : '';
                    echo "<option value='" . $categoriaPadre['id'] . "' $selected>" . htmlspecialchars($categoriaPadre['nombre']) . "</option>";
                } ?>
            </select>
            <button type="submit" formaction="productos.php" formmethod="POST" formnovalidate>
                Cargar subcategorías
            </button>
            <br>
            <label for="categoraHija">Categoria hija:</label><br>
            <?php
                if ($catPadreSel === null){
                    echo "<select name='categoriaHija' required disabled>";
                    echo "<option>Seleccionar categoria padre primero</option>";
                    echo "</select>";
                } else {
                    echo "<select name='categoriaHija' required>";
                    echo "<option>Seleccionar categoria hija</option>";
                    foreach ($listaCategorias as $categoriaPadre){
                        if ($categoriaPadre['id'] === $catPadreSel && $categoriaPadre['subcategorias'] !== null){
                            foreach ($categoriaPadre['subcategorias'] as $subcat){
                                $subSelected = (isset($_POST['categoriaHija']) && (int)$_POST['categoriaHija'] === $subcat['id']) ? 'selected' : '';
                                echo "<option $subSelected>" . htmlspecialchars($subcat['nombre']) . "</option>";
                            }
                            break;
                        }
                    }
                    echo "</select>";
                }
            ?>
            <br>
            <label for="marca">Marca:</label><br>
            <select name="marca" required>
                <option>Seleccionar marca</option>
                <?php
                foreach ($listaMarcas as $marca) {
                    echo "<option>" . htmlspecialchars($marca['nombre']) . "</option>";
                }
                ?>
            </select>
            <br>
            <label for="nombre">Nombre:</label><br>
            <input type="text" name="nombre" required>
            <br>
            <label for="descripcion">Descripción:</label><br>
            <textarea name="descripcion" required></textarea>
            <br>
            <label for="modelo">Modelo:</label><br>
            <input type="text" name="modelo" required>
            <br>
            <label for="precio">Precio:</label><br>
            <input type="number" name="precio" required>
            <br>
            <label for="imagen">Imagen:</label><br>
            <input type="file" name="imagen" accept="image/*" required>
            <br>
            <label for="destacado">Destacado:</label><br>
            <input type="checkbox" name="destacado">
            <br>
            <button type="submit" class="procesar">Crear producto</button>
        </form>
        </section>
    </main>
    <?php include_once '../../app/includes/footer_admin.php'; ?>
</body>
</html>