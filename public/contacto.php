<?php
declare(strict_types=1);
session_start();
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
        <section class="contacto">
            <h2>Contacto</h2>
            <p>¿Tienes alguna pregunta? ¡Estamos aquí para ayudarte!</p>
            <form action="procesar_contacto.php" method="POST">
                <label for="nombre">Nombre completo:</label><br>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre y apellido" required><br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" placeholder="ejemplo@gmail.com" required><br>
                <label for="telefono">Numero de teléfono:</label><br>
                <input type="number" id="telefono" name="telefono" placeholder="Ej: 1123456789" required><br>
                <label for="area">Área:</label><br>
                <select name="area" required>
                    <option value="">Selecciona un área</option>
                    <option value="ventas">Farmacia</option>
                    <option value="soporte">Belleza</option>
                    <option value="compras">Compras</option>
                </select><br>
                <label for="mensaje">Mensaje:</label><br>
                <textarea id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea><br>
                <button type="submit" class="procesar">Enviar</button>
            </form>
        </section>
    </main>
    <?php include_once '../app/includes/footer_public.php'; ?>
</body>
</html>