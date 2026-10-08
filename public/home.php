<?php
declare(strict_types=1);
session_start();

require_once '../app/includes/database.php';
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
        <h1>Productos Destacados</h1>
        <section class="productos-destacados">
            <?php foreach ($productos as $producto) { 
                 if ($producto['destacado'] == true) { 
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
            } ?>
        </section>
    </main>
</body>
</html>