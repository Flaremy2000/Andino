<?php 


include_once '../conexion.php';

class logueo extends conexion{

    function obtener_logueo($cedula){
        $query = $this->conexion->prepare("SELECT * FROM `usuario` WHERE `correo` = :id");
        $query->bindParam(':id', $cedula, PDO::PARAM_STR);        
        $query->execute();
        return $query;
    }
}

?>