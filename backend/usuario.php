<?php 

include_once '../conexion.php';


class usuario extends conexion{

    function obtener_usuario($cedula){
        $query = $this->conexion->prepare("SELECT * FROM `usuario` WHERE `correo` = :id");
        $query->bindParam(':id', $cedula, PDO::PARAM_STR);
        $query->execute();
        return $query;
    }
    function obtener_usuarios(){
        $query = $this->conexion->prepare("SELECT * FROM `usuario` WHERE `estado` != '0'");
        $query->execute();
        return $query;
    }
    function guardar_usuario($nombre, $apellido, $nick, $correo, $contra, $estado){
        $query = $this->conexion->prepare("INSERT INTO `usuario` (`nombre`, `apellido`, `nick`, `correo`, `contrasena`, `estado`) VALUES (:nombre, :apellido, :nick, :correo, :contrasena, :estado)");
        $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $query->bindParam(':nick', $nick, PDO::PARAM_STR);
        $query->bindParam(':correo', $correo, PDO::PARAM_STR);
        $query->bindParam(':contrasena', $contra, PDO::PARAM_STR);
        $query->bindParam(':estado', $estado, PDO::PARAM_STR);
        $query->execute();
        return $query;
    }
    function editar_usuario($id, $nombre, $apellido, $nick, $correo, $contra, $estado){
        $query = $this->conexion->prepare("UPDATE `usuario` SET `nombre` = :nombre, `apellido` = :apellido, `nick` = :nick, `correo` = :correo, `contrasena` = :contrasena, `estado` = :estado WHERE `usuario`.`Id_us` = :id");
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $query->bindParam(':nick', $nick, PDO::PARAM_STR);
        $query->bindParam(':correo', $correo, PDO::PARAM_STR);
        $query->bindParam(':contrasena', $contra, PDO::PARAM_STR);
        $query->bindParam(':estado', $estado, PDO::PARAM_STR);
        $query->execute();
        return $query;
    }
    function editar_usuario_sc($id, $nombre, $apellido, $nick, $correo, $estado){
        $query = $this->conexion->prepare("UPDATE `usuario` SET `nombre` = :nombre, `apellido` = :apellido, `nick` = :nick, `correo` = :correo, `estado` = :estado WHERE `usuario`.`Id_us` = :id");
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $query->bindParam(':nick', $nick, PDO::PARAM_STR);
        $query->bindParam(':correo', $correo, PDO::PARAM_STR);
        $query->bindParam(':estado', $estado, PDO::PARAM_STR);
        $query->execute();
        return $query;
    }

    function eliminar($id){
        $query = $this->conexion->prepare("UPDATE `usuario` SET `estado`= '0' WHERE `Id_us`= :id");
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        return $query;
    }


    function editar_pass($id, $contra){
        $query = $this->conexion->prepare("UPDATE `usuario` SET `contrasena` = :contrasena WHERE `usuario`.`Id_us` = :id");
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->bindParam(':contrasena', $contra, PDO::PARAM_STR);
        $query->execute();
        return $query;
    }

}

?>