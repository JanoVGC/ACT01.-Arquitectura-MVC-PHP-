<?php
session_start();

require_once __DIR__ . 'arquitectura_MVC/controller/AuthController.php';
require_once __DIR__ . 'arquitectura_MVC/controller/usuariController';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIAR SESSIO</title>
</head>
<body>

  <h1>Iniciar sesión</h1>
        <form method="post" action="index.php">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Iniciar sesión">
    
</body>
</html>