<?php

require_once __DIR__ . '/arquitectura_MVC/model/conexion.php';

    class Usuari {

        public function buscarUsuario($usuario) {
           global $conexion; 

            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'"; 

            
             $resultat = $conexion->query($sql);           

            return $resultat->fetch_array();
        }
        
        public function crearUsuario($usuario, $nombre, $apellido, $email, $password, $rol) {
            global $conexion; 

            $sql = "INSERT INTO usuarios(usuario, nombre_usuario, apellido_usuario, email_usuario, password_usuario, rol_usuario)
                    VALUES ('$usuario', '$nombre', '$apellido', '$email', '$password', '$rol')";

                    return $conexion->query($sql);
        }

        public function llistarUsuaris() {
            global $conexion; 

            $sql = "SELECT usuario, nombre_usuario, apellido_usuario, email_usuario, password_usuario, rol_usuario 
                    FROM usuarios"; 

                    return $conexion->query($sql); 
        }

        public function modificarEmail($usuario , $email) {
            global $conexion; 

            $sql = "UPDATE usuarios
                    SET emial_usuario = '$email'
                    WHERE usuario = '$usuario'"; 

                    return $conexion->query($sql); 
        }

    }
?>