<?php

require_once __DIR__ . '/../model/usuari.php';

class usuariController {

    // Usuari: 3-50 caràcters, només lletres, números i guió baix
    private function usuariValid($usuario) {
        $longitud = strlen($usuario);

        return $longitud >= 3
            && $longitud <= 50
            && ctype_alnum(str_replace('_', '', $usuario));
    }

    // Text sense caràcters que permetrien trencar la consulta SQL
    private function textSegur($text, $maxim) {
        if ($text === '' || strlen($text) > $maxim) {
            return false;
        }
        if (strpbrk($text, "'\"\\;`#") !== false) {
            return false;
        }
        if (strpos($text, '--') !== false) {
            return false;
        }
        return true;
    }

    private function emailValid($email) {
        return $this->textSegur($email, 200)
            && filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function registrarUsuari($usuario, $nombre, $apellido, $email, $password, $rol) {

        if (!$this->usuariValid($usuario)) {
            return false;
        }
        if (!$this->textSegur($nombre, 50) || !$this->textSegur($apellido, 100)) {
            return false;
        }
        if (!$this->emailValid($email)) {
            return false;
        }
        if (!in_array($rol, ['admin', 'usuario'], true)) {
            return false;
        }

        $model = new Usuari();

        if ($model->buscarUsuario($usuario) || $model->existeEmail($email)) {
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        return $model->crearUsuario($usuario, $nombre, $apellido, $email, $password, $rol);
    }

    public function llistarUsuaris() {
        $model = new Usuari();
        return $model->llistarUsuaris();
    }

    public function obtenirUsuari($usuario) {
        $model = new Usuari();
        return $model->buscarUsuario($usuario);
    }

    public function modificarEmail($usuario, $email) {

        if (!$this->emailValid($email)) {
            return false;
        }

        $model = new Usuari();

        if ($model->existeEmail($email, $usuario)) {
            return false;
        }

        return $model->modificarEmail($usuario, $email);
    }
}