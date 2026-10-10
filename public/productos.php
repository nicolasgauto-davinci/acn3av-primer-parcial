<?php
declare(strict_types=1);
session_start();

require_once '../app/includes/database.php';

$tituloSeccion = "Todos los productos";

$prodsFiltrados = $listaProductos;

//Filtro categorias
if (isset($_GET['categoria']) && $_GET['categoria'] !== ''){
    $catSelec = $_GET['categoria'];
    $tituloSeccion = htmlspecialchars($catSelec);

    $tempProds = [];
    foreach ($prodsFiltrados as $producto){
        if ($producto['categorias']['padre'] === $catSelec || $producto['categorias']['hija'] === $catSelec){
            $tempProds[] = $producto;
        }
    }
    $prodsFiltrados = $tempProds;
}

//Filtro marcas
if (isset($_GET['marcas']) && is_array($_GET['marcas'])) {
    $marcasSelecIds = $_GET['marcas'];
    
    $tempProds = [];
    foreach ($prodsFiltrados as $producto) {
        $idMarcaProducto = null;
        foreach ($listaMarcas as $marcaInfo) {
            if ($marcaInfo['nombre'] === $producto['marca']) {
                $idMarcaProducto = (string) $marcaInfo['id'];
                break;
            }
        }
        if ($idMarcaProducto !== null && in_array($idMarcaProducto, $marcasSelecIds)) {
            $tempProds[] = $producto;
        }
    }
    $prodsFiltrados = $tempProds;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include_once '../app/includes/header_public.php'; ?>
    <main class="layout-productos">
        <section class="menu-filtros">
            <h3>Categorias</h3>
            <ul>
                <?php foreach ($listaCategorias as $catPadre){
                    echo "<li>";
                    echo "<a href='?categoria=" . urlencode($catPadre['nombre']) . "'><strong>" . htmlspecialchars($catPadre['nombre']) . "</strong></a>";
                    echo "<ul>";
                    foreach ($catPadre['subcategorias'] as $subcat){
                        echo "<li><a href='?categoria=" . urlencode($subcat['nombre']) . "'>" . htmlspecialchars($subcat['nombre']) . "</a></li>";
                    }
                    echo "</ul>";
                    echo "</li>";
                } 
                ?>
            </ul>

            <h3>Ordenar por:</h3>
            <form action="productos.php" method="GET">
                <?php if (isset($_GET['categoria'])) { 
                    echo "<input type=\"hidden\" name=\"categoria\" value=\"" . htmlspecialchars($_GET['categoria']) . "\">";
                 } ?>
                <select name="orden">
                    <option value="">Seleccionar</option>
                    <option value="destacados" <?php if (isset($_GET['orden']) && $_GET['orden'] == 'destacados') echo 'selected'; ?>>Destacados</option>
                    <option value="ranking_desc" <?php if (isset($_GET['orden']) && $_GET['orden'] == 'ranking_desc') echo 'selected'; ?>>Ranking: Mayor a Menor</option>
                    <option value="alfabetico_asc" <?php if (isset($_GET['orden']) && $_GET['orden'] == 'alfabetico_asc') echo 'selected'; ?>>A-Z</option>
                    <option value="alfabetico_desc" <?php if (isset($_GET['orden']) && $_GET['orden'] == 'alfabetico_desc') echo 'selected'; ?>>Z-A</option>
                </select>
                <button type="submit">Aplicar Orden</button>

            <h3>Marcas</h3>
            <form action="productos.php" method="GET">
                <?php if (isset($_GET['categoria'])) { 
                    echo "<input type=\"hidden\" name=\"categoria\" value=\"" . htmlspecialchars($_GET['categoria']) . "\">";
                 } ?>
            <ul>
                <?php foreach ($listaMarcas as $marca) { 
                    if ($marca['activo']) {
                    $verificado = '';
                    if (isset($_GET['marcas']) && in_array($marca['id'], $_GET['marcas'])) {
                        $verificado = 'verificado';
                    }
                    echo "<li>";
                    echo "<input type='checkbox' name='marcas[]' value='" . $marca['id'] . "' $verificado> " . htmlspecialchars($marca['nombre']);
                    echo "</li>";
                    }
                } ?>
            </ul>

            <button type="submit">Aplicar Filtros</button>
            <?php if (isset($_GET['marcas'])){
                $limpiarLink = isset($_GET['categoria']) ? "productos.php?categoria=" . urlencode($_GET['categoria']) : "productos.php";
                echo "<a href='$limpiarLink'>Limpiar filtros de marca</a>";
            }
            ?>
            </form>
        </section>

        <!-- Contenedor de productos -->
        <section class="contenedor-productos">
            <?php
            echo "<h2>$tituloSeccion</h2>";
            if(empty($prodsFiltrados)){
                echo "<p>No se encontrar productos que coincidan con los filtros seleccionados</p>";
            } else{
                foreach ($prodsFiltrados as $producto) { 
                    echo "<article>";
                    echo "<a href=\"./detalle_producto.php?id=" . $producto['id'] . "\">";
                    echo "<img src=\"" . $producto['imagen'] . "\" alt=\"" . $producto['nombre'] . "\">";
                    echo "<p class=\"nombreProducto\"><strong>" . $producto['nombre'] . "</strong></p>";
                    echo "<p class=\"marcaProducto\"><i>" . $producto['marca'] . "</i></p>";                    
                    echo "<p class=\"precioProducto\"><b>$ " . number_format($producto['precio'], 0, ',', '.') . "</b></p>";
                    if ($producto['ranking'] !== null) {
                        echo "<p>★" . $producto['ranking'] . "</p>";
                    }
                    echo "</a>";
                    echo "</article>";
                }
            }
             ?>
        </section>
    </main>
    <?php include_once '../app/includes/footer_public.php'; ?>
</body>
</html>