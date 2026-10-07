<?php
//Las categorias las tengo que guardar en un archivo en admin
/*$categorias = array(
    "Farmacia" => array("Venta Libre", "Recetados"),
    "Perfumería" => array("Fragancias Nacionales", "Fragancias Importadas"),
    "Cuidado Personal" => array("Capilar", "Skin Care")
);*/

include_once '../public/admin/categorias.php';
include_once '../public/admin/marcas.php';

$tituloSeccion = "Todos los productos";

if (isset($_GET['categoria'])) {
    $tituloSeccion = htmlspecialchars($_GET['categoria']);
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
    <main>
        <section class="menu">
            <h3>Categorias</h3>
            <ul>
                <?php foreach ($categorias as $catPrincipal => $subcategorias){
                    echo "<li>";
                    echo "<a href='?categoria=" . urlencode($catPrincipal) . "'><strong>$catPrincipal</strong></a>";
                    echo "<ul>";
                    foreach ($subcategorias as $sub) {
                        echo "<li><a href='?categoria=" . urlencode($sub) . "'>$sub</a></li>";
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
                    $checked = '';
                    if (isset($_GET['marcas']) && in_array($marca, $_GET['marcas'])) {
                        $checked = 'checked';
                    }
                    echo "<li>";
                    echo "<input type='checkbox' name='marcas[]' value='" . $marca . "' $checked> $marca";
                    echo "</li>";
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
        <section class="productos">
            <h2><?php echo $tituloSeccion; ?></h2>
        </section>
    </main>
</body>
</html>