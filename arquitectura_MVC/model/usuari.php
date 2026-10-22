<?php

require_once __DIR__ . '/arquitectura_MVC/model/conexion.php';

    class Usuari {

        public function buscarUsuario($usuario) {
           global $conexion; 

            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'"; 

            
             $resultat = $conexion->query($sql);           

            return $resultat->fetch_array();
        }

        public function existeEmail ($email, $usuario = '') {
            global $conexion;             


            $sql = "SELECT usuario, nombre_usuario, apellido_usuario, email_usuario, rol_usuario
                    FROM usuarios
                    ORDER BY usuario";;
                    
                    $resultat = $conexion->query($sql);

                    return $resultat->num_rows > 0; 
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
                    FROM usuarios
                    ORDER BY usuario";

                    $resultat = $conexion->query($sql);

                    return $resultat->fetch_all(MYSQLI_ASSOC);
        }

        public function modificarEmail($usuario , $email) {
            global $conexion; 

            $sql = "UPDATE usuarios
                    SET emaIl_usuario = '$email'
                    WHERE usuario = '$usuario'"; 

                    return $conexion->query($sql); 
        }

    }
?>