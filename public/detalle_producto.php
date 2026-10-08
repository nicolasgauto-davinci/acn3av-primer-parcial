<?php
declare(strict_types=1);
session_start();

require_once '../app/includes/database.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $prod_encontrado = null;

    foreach ($listaProductos as $prod) {
        if ($prod['id'] === $id) {
            $prod_encontrado = $prod;
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
    <?php include_once '../app/includes/header_public.php'; ?>
    <main>
        <section class="detalle-producto">
            <h2><?php echo htmlspecialchars($prod_encontrado['nombre']); ?></h2>
            <img src="<?php echo htmlspecialchars($prod_encontrado['imagen']); ?>" alt="<?php echo htmlspecialchars($prod_encontrado['nombre']); ?>">
            <p><strong>Marca:</strong> <?php echo htmlspecialchars($prod_encontrado['marca']); ?></p>
            <p><strong>Modelo:</strong> <?php echo htmlspecialchars($prod_encontrado['modelo']); ?></p>
            <p><strong>Descripción:</strong> <?php echo htmlspecialchars($prod_encontrado['descripcion']); ?></p>                
            <p><strong>Precio:</strong> $ <?php echo number_format($prod_encontrado['precio'], 0, ',', '.'); ?></p>    
            <?php if ($prod_encontrado['ranking'] !== null) { ?>
            <p><strong>Ranking:</strong> Top <?php echo $prod_encontrado['ranking']; ?></p>
            <?php } ?>
            <div class="comentarios">
                <h3>Comentarios de Usuarios</h3>
                <?php 
                if (empty($prod_encontrado['comentarios'])) {
                    echo "<p>No hay comentarios para este producto aún.</p>";
                } else {
                    echo "<ul>";
                    foreach ($prod_encontrado['comentarios'] as $comentario) {
                        echo "<li>";
                        echo "<strong>Valoración: " . $comentario['valoracion'] . "/5</strong><br>";
                        echo "<em>" . htmlspecialchars($comentario['email']) . "</em> dijo: <br>";
                        echo htmlspecialchars($comentario['comentario']);
                        echo "</li><br>";
                    }
                    echo "</ul>";
                }
                ?>
                </div>
        </section>

        <div>
            <h3>Dejar un comentario</h3>
            <form action="procesar_comentario.php?id=<?php echo $id; ?>" method="POST">
        
                <div>
                    <label for="email_comentario">Email:</label><br>
                    <input type="email" id="email_comentario" name="email_comentario" required placeholder="tuemail@ejemplo.com">
                </div>

                <div>
                    <label for="texto_comentario">Comentario:</label><br>
                    <textarea id="texto_comentario" name="texto_comentario" rows="4" cols="50" required placeholder="Escribe tu opinión sobre el producto..."></textarea>
                </div>
                <div>
                    <label for="valoracion">Valoración (1 a 5):</label><br>
                    <select id="valoracion" name="valoracion" required>
                        <option value="">Selecciona una puntuación</option>
                        <option value="1">1 - Muy Malo</option>
                        <option value="2">2 - Malo</option>
                        <option value="3">3 - Regular</option>
                        <option value="4">4 - Bueno</option>
                        <option value="5">5 - Excelente</option>
                    </select>
                </div>
                <button type="submit">Enviar comentario</button>
            </form>
        </div>
    </main>
</body>
</html>