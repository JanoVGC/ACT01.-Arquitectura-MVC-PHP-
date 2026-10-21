<?php

require_once __DIR__ . '/arquitectura_MVC/model/usuari.php';

class AuthController {

    public function login($usuario, $password) {

        $model = new Usuari(); 

        $usuari = $model->buscarUsuario($usuario); 

        if ($usuari && password_verify($password, $usuari['password_usuario']) ) {
                $_SESSION['id'] = $usuari ['id_usuario'];
                $_SESSION['usuario'] = $usuari['usuario']; 
                $_SESSION['rol'] = $usuari['rol_usuario'];

                return true; 
            }
        

        return false; 


    }
}

     

?>