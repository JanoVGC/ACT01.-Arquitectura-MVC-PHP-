<?php
session_start();

require_once __DIR__ . 'arquitectura_MVC/controller/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? ''; 
    $password = $_POST['password'] ?? ''; 

    // authenticator
    $authController = new AuthController(); 

    // login
   if ($authController->login($usuario, $password)) {
    $_SESSION['usuario'] = $usuario; 

    header('Location: arquitectura_MVC/view/perfil.php'); 
    exit(); 

   } else {
    $error = "Credencials incorrectos"; 
   }
}

require_once __DIR__ . 'arquitectura_MVC/view/login.php'

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