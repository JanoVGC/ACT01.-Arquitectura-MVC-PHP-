<?php

require_once __DIR__ . '/../model/usuari.php';

class AuthController {

    public function login($usuario, $password) {

        // Mateixa validació que al registre
        $longitud = strlen($usuario);

        if ($longitud < 3 || $longitud > 50 || !ctype_alnum(str_replace('_', '', $usuario))) {
            return false;
        }

        $model  = new Usuari();
        $usuari = $model->buscarUsuario($usuario);

        if ($usuari && password_verify($password, $usuari['password_usuario'])) {
            $_SESSION['id']      = $usuari['id_usuario'];
            $_SESSION['usuario'] = $usuari['usuario'];
            $_SESSION['rol']     = $usuari['rol_usuario'];

            return true;
        }

        return false;
    }
}