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
        <h2 class="resaltado">Login</h2>
        <form class="resaltado" action="procesar_login.php" method="POST">
            <label>Email:</label>
            <input type="email" name="email" required><br>
            <label>Contraseña:</label>
            <input type="password" name="clave" required><br>
            <label>
            <input type="checkbox" name="recordar"> Recordarme
            </label><br>            
            <button type="submit">Ingresar</button>
        </form>
        <p class="resaltado">O</p>
        <form action="register.php" method="POST">
            <button type="submit">Registrarse</button>
        </form>
    </main>
</body>
</html>

<?php

//Podria juntar todos los errores en un solo if en una funcion
if(isset($_GET['error'])) {
    if($_GET['error'] === '2') {
        echo "<p style='color: red;'>Por favor, complete todos los campos.</p>";
    }
}