<?php
    require_once __DIR__ . '/arquitectura_MVC/model/usuari.php';


    class usuariController {
        public function registrarUsuari($usuario, $nombre, $apellido, $email, $password, $rol) {

            $model = new Usuari(); 
            $password = password_hash($password, PASSWORD_DEFAULT); 

            return $model->crearUsuario(
                $usuario, 
                $nombre, 
                $apellido, 
                $email, 
                $password, 
                $rol               

            );
        }

        public function llistarUsuaris() {
            $model = new Usuari(); 
            return $model->llistarUsuaris();

        }

        public function modificarEmail($usuario, $email) {
            $model = new Usuari(); 

            if ($model->existeEmail($email, $usuario)) {
                return false; 
            }

            return $model->modificarEmail($usuario, $email); 
        }



    }




?>