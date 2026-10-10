<?php
declare(strict_types=1);
session_start();

require_once '../../app/includes/database.php';

$id_buscado = null;
$producto_encontrado = null;
$hay_aprobados = false;
$hay_pendientes = false;
$filtro_estado = $_GET['estado'] ?? 'todos';

if (isset($_GET['id'])) {
    $id_buscado = (int) $_GET['id'];
    foreach ($listaProductos as $prod) {
        if ($prod['id'] === $id_buscado) {
            $producto_encontrado = $prod;
            break;
        }
    }
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
    <?php include_once '../../app/includes/header_admin.php'; ?>
    <main>
        <section>
            <h1>Comentarios Aprobados</h1>
            <form action="comentarios.php" method="GET">
            <input name="id" value="<?php echo htmlspecialchars((string)$id_buscado) ?>" disabled>
            <select name="estado">
                <option value="todos" <?php echo ($filtro_estado === 'todos') ? 'selected' : ''; ?>>Todos los comentarios</option>
                <option value="activos" <?php echo ($filtro_estado === 'activos') ? 'selected' : ''; ?>>Activos</option>
                <option value="inactivos" <?php echo ($filtro_estado === 'inactivos') ? 'selected' : ''; ?>>Inactivos</option>
            </select>
            <button type="submit">Aplicar filtro</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Comentario</th>
                    <th>Valoración</th>
                    <th>Fecha</th>
                    <th>Producto</th>
                </tr>
                <tbody>
                    <?php 
                    if ($producto_encontrado['comentarios'] !== null){
                        foreach ($producto_encontrado['comentarios'] as $comentario) {
                            $aprobado = $comentario['aprobado'] ?? false;
                            if (!$aprobado){
                                continue;
                            }
                            $activo = $comentario['activo'] ?? true;
                            if ($filtro_estado === 'activos' && !$activo){
                                continue;
                            }
                            if ($filtro_estado === 'inactivos' && $activo){
                                continue;
                            }
                            $hay_aprobados = true;
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($comentario['comentario']) . "</td>";
                            echo "<td>" . htmlspecialchars((string)$comentario['valoracion']) . " / 5</td>";
                            echo "<td>" . htmlspecialchars((string)$comentario['fecha']) . "</td>";
                            echo "<td>" . htmlspecialchars($producto_encontrado['nombre']) . "</td>";
                            echo "</tr>";
                        }
                        if(!$hay_aprobados){
                            echo "<tr><td>No hay comentarios aprobados para el producto seleccionado</td></tr>";
                        }
                    }
                    else{
                        echo "<tr><td>No hay comentarios para mostrar</td></tr>";
                    }
                    ?>
                </tbody>
            </thead>
        </table>
        </section>
        <section>
            <h1>Comentarios Pendientes</h1>
            <table>
                <thead>
                    <tr>
                        <th>Comentario</th>
                        <th>Valoración</th>
                        <th>Fecha</th>
                        <th>Producto</th>
                        <th>Aprobar/Desaprobar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                        if ($producto_encontrado['comentarios'] !== null){
                            foreach ($producto_encontrado['comentarios'] as $comentario) {
                                $aprobado = $comentario['aprobado'] ?? false;
                                if($aprobado){
                                    continue;
                                }
                                $hay_pendientes = true;
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($comentario['comentario']) . "</td>";
                                echo "<td>" . htmlspecialchars((string)$comentario['valoracion']) . " / 5</td>";
                                echo "<td>" . htmlspecialchars((string)$comentario['fecha']) . "</td>";
                                echo "<td>" . htmlspecialchars($producto_encontrado['nombre']) . "</td>";
                                echo "<td>";
                                echo "<a href='procesar_comentario.php?id=" . $id_buscado . "&accion=aprobar'>Aprobar</a> / ";
                                echo "<a href='procesar_comentario.php?id=" . $id_buscado . "&accion=desaprobar'>Desaprobar</a>";
                                echo "</td>";
                            }
                            if(!$hay_pendientes){
                                echo "<tr><td>No hay comentarios pendientes para el producto seleccionado</td></tr>";
                            }
                        }
                        else{
                            echo "<tr><td>No hay comentarios para mostrar</td></tr>";
                        } ?>
                    </tr>
                </tbody>
            </table>
        </section>
        <div><a href="productos.php">Volver al listado de productos</a></div>
    </main>
    <?php include_once '../../app/includes/footer_admin.php'; ?>
</body>
</html>