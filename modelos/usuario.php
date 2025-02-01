<?php
require "../config/conexion.php";

class user{

    public function inicioSesion($usuario, $contrasena){
        $sql = "SELECT * FROM usuario WHERE usuario='$usuario' AND password = '$contrasena' ";
        return ejecutarConsulta($sql);
    }


}


?>