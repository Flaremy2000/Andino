<?php 

include_once '../conexion.php';


class proveedor extends conexion{

    function obtener_proveedor($cedula){
        $query = $this->conexion->prepare("SELECT * FROM `usuario` WHERE `correo` = :id");
        $query->bindParam(':id', $cedula, PDO::PARAM_STR);
        $query->execute();
        return $query;
    }
    function obtener_proveedores(){
        $query = $this->conexion->prepare("SELECT * FROM `proveedor` WHERE `estado` != '0'");
        $query->execute();
        return $query;
    }
    function guardar_proveedor($nombre, $descripcion, $contacto, $correo, $empresa, $imagen){
        $query = $this->conexion->prepare("INSERT INTO `proveedor` (`nom_prov`, `description`, `contacto`, `correo`, `empresa`, `imagen`) VALUES (:nombre, :descriptio, :contacto, :correo, :empresa, :imagen)");
        $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindParam(':descriptio', $descripcion, PDO::PARAM_STR);
        $query->bindParam(':contacto', $contacto, PDO::PARAM_STR);
        $query->bindParam(':correo', $correo, PDO::PARAM_STR);
        $query->bindParam(':empresa', $empresa, PDO::PARAM_STR);
        $query->bindParam(':imagen', $imagen, PDO::PARAM_STR);
        $query->execute();
        return $query;
    }
    function editar_proveedor($id, $nombre, $descripcion, $contacto, $correo, $empresa, $imagen){
        $query = $this->conexion->prepare("UPDATE `proveedor` SET `nom_prov` = :nombre, `description` = :descriptio, `contacto` = :contacto, `correo` = :correo, `empresa` = :empresa, `imagen` = :imagen WHERE `proveedor`.`Id_prov` = :id");
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindParam(':descriptio', $descripcion, PDO::PARAM_STR);
        $query->bindParam(':contacto', $contacto, PDO::PARAM_STR);
        $query->bindParam(':correo', $correo, PDO::PARAM_STR);
        $query->bindParam(':empresa', $empresa, PDO::PARAM_STR);
        $query->bindParam(':imagen', $imagen, PDO::PARAM_STR);
        $query->execute();
        return $query;
    }
    function editar_proveedor_si($id, $nombre, $descripcion, $contacto, $correo, $empresa){
        $query = $this->conexion->prepare("UPDATE `proveedor` SET `nom_prov` = :nombre, `description` = :descriptio, `contacto` = :contacto, `correo` = :correo, `empresa` = :empresa WHERE `proveedor`.`Id_prov` = :id");
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindParam(':descriptio', $descripcion, PDO::PARAM_STR);
        $query->bindParam(':contacto', $contacto, PDO::PARAM_STR);
        $query->bindParam(':correo', $correo, PDO::PARAM_STR);
        $query->bindParam(':empresa', $empresa, PDO::PARAM_STR);
        $query->execute();
        return $query;
    }

    function eliminar_proveedor($id){
        $query = $this->conexion->prepare("UPDATE `proveedor` SET `estado`= '0' WHERE `Id_prov` = :id");
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        return $query;
    }

}

?>