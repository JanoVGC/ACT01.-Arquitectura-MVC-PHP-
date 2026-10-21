<?php
session_start();

require_once __DIR__ . 'arquitectura_MVC/controller/AuthController.php';

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? ''); 
    $password = $_POST['password'] ?? ''; 

    // authenticator
    $authController = new AuthController(); 
    $loginExitos = $authController->login($usuario, $password);

    if ($loginExitos) {
        header('Location: index.php'); 
        exit(); 
        
    } else {
        $error = 'Credencials incorrectes'; 

    }

    

  
}

require_once __DIR__ . 'arquitectura_MVC/view/login.php'

?>
