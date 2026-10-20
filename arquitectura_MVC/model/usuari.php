<?php

require_once __DIR__ . '/arquitectura_MVC/model/conexion.php';

    class Usuari {

        public function buscarUsuario($usuario) {
           global $conexion; 

            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'"; 

            
             $resultat = $conexion->query($sql);           

            return $resultat->fetch_array();
        }
    }
?>