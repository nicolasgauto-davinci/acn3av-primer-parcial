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
    <main>
        <h2>Registrarse</h2>
        <form action="procesar_registro.php" method="POST">
            <label>Nombre completo:</label>
            <input type="text" name="nombre_completo" required><br>
            <label>Mail:</label>
            <input type="email" name="nuevo_mail" required><br>
            <label>Contraseña:</label>
            <input type="password" name="nueva_clave" required><br>
            <label>Confirmar contraseña:</label>
            <input type="password" name="confirmar_clave" required><br>
            <button type="submit">Guardar</button>
        </form>
    </main>
</body>
</html>

<?php

if(isset($_GET['error'])) {
    if($_GET['error'] === '1') {
        echo "<p style='color: red;'>Las contraseñas no coinciden.</p>";
    }
}