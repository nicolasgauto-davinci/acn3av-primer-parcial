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
    <link rel="stylesheet" href="../assets/css/global.css">
</head>
<body>
    <?php include_once '../../app/includes/header_admin.php'; ?>
    <main>
        <h1>Gestión de Productos</h1>
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
        <h1>Creación de Productos</h1>
        <form action="editar_producto.php" method="post" enctype="multipart/form-data">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>
            <br>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" required></textarea>
            <br>
            <label for="precio">Precio:</label>
            <input type="number" name="precio" required>
            <br>
            <label for="categoriaMadre">Categoría madre:</label>
            <select name="categoriaMadre" required>
                <option>Seleccionar categoría madre</option>
                <?php foreach ($listaCategorias as $categoriaMadre => $categoriasHijas) {
                    echo "<option>" . htmlspecialchars($categoriaMadre) . "</option>";
                } ?>
            </select>
            <br>

<!-- no pude hacer que seleccione una categoria madre, y que en consecuencia muestre solo
 las categorias hijas que le corresponden

            <label for="categoriaHija">Categoría hija:</label>
            <select name="categoriaHija" required>
                <option>Seleccionar categoria hija</option>
                <?php /* foreach($listaCategorias as $categoriaMadre => $categoriasHijas){
                    echo "<option>" . htmlspecialchars($categoriasHijas) . "</option>";
                } */?>    
            </select>
            <br>
-->
            <label for="marca">Marca:</label>
            <select name="marca" required>
                <option>Seleccionar marca</option>
                <?php
                foreach ($listaMarcas as $marca) {
                    echo "<option value='" . $marca . "'>" . $marca . "</option>";
                }
                ?>
            </select>
            <br>
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" required>
            <br>
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" accept="image/*" required>
            <br>
            <label for="destacado">Destacado:</label>
            <input type="checkbox" name="destacado">
            <br>
            <button type="submit">Crear producto</button>
        </form>
    </main>
</body>
</html>