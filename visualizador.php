<?php 

include_once 'conexion.php';

class visualizador extends conexion{
    function obtener_configuraciones(){
        $query = $this->conexion->prepare("SELECT * FROM configuraciones ORDER BY id_config desc limit 1 ");
        $query->execute();
        return $query;
    }
    
    function obtener_configuracion($fecha, $fecha_fin){
        $query = $this->conexion->prepare("SELECT EXTRACT(DAY FROM tiempo_llenar) AS dia, EXTRACT(MONTH FROM tiempo_llenar) AS mes, EXTRACT(YEAR FROM tiempo_llenar) AS anio, EXTRACT(HOUR from tiempo_llenar) AS hora, EXTRACT(MINUTE from tiempo_llenar) AS minuto FROM configuraciones WHERE tiempo_llenar BETWEEN :tiempo_inicio AND :tiempo");
        $query->bindParam(':tiempo_inicio', $fecha, PDO::PARAM_STR);
        $query->bindParam(':tiempo', $fecha_fin, PDO::PARAM_STR);
        $query->execute();
        return $query;
    }
    function obtener_dosificaciones($fecha, $fecha_fin){
        $query = $this->conexion->prepare("SELECT * FROM `configuraciones` WHERE tiempo_llenar BETWEEN :tiempo_inicio AND :tiempo ORDER BY tiempo_llenar ASC LIMIT 5");
        $query->bindParam(':tiempo_inicio', $fecha, PDO::PARAM_STR);
        $query->bindParam(':tiempo', $fecha_fin, PDO::PARAM_STR);
        $query->execute();
        return $query;
    }
    function obtener_ultimados(){
        $query = $this->conexion->prepare("SELECT * FROM `configuraciones` ORDER BY `configuraciones`.`tiempo_llenar` DESC LIMIT 1");
        $query->execute();
        return $query;
    }

    function obtener_comedero($micro){
        $query = $this->conexion->prepare("SELECT * FROM comederos WHERE Id_micro= :id");
        $query->bindParam(':id', $micro, PDO::PARAM_STR);
        $query->execute();
        return $query;
    }

    function guardar_bebedero($micro, $estado){
        $query = $this->conexion->prepare("INSERT INTO `bebedero` (`micro`, `estado`) VALUES (:micro, :estado)");
        $query->bindParam(':micro', $micro, PDO::PARAM_STR);
        $query->bindParam(':estado', $estado, PDO::PARAM_STR);
        $query->execute();
        return $query;
    }

    function guardar_contenido($micro, $estado, $fecha){
        $query = $this->conexion->prepare("INSERT INTO `contenedor` (`micro`, `llenura`, `fecha`) VALUES (:micro, :estado, :fecha)");
        $query->bindParam(':micro', $micro, PDO::PARAM_STR);
        $query->bindParam(':estado', $estado, PDO::PARAM_STR);
        $query->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $query->execute();
        return $query;
    }

    function guardar_fecha($fecha){
        $query = $this->conexion->prepare("INSERT INTO `configuraciones` (`tiempo_llenar`) VALUES (:fecha)");
        $query->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $query->execute();
        return $query;
    }
    function cambiar_estado($estado){
        $query = $this->conexion->prepare("UPDATE `configuracion_agua` SET `estado` = :estado WHERE `configuracion_agua`.`Id_agua` = 1");
        $query->bindParam(':estado', $estado, PDO::PARAM_STR);
        $query->execute();
        return $query;
    }
    
    function obtener_estado_aguas(){
        $query = $this->conexion->prepare("SELECT * FROM `configuracion_agua`");
        $query->execute();
        return $query;
    }
    
    function obtener_distancia(){
        $query = $this->conexion->prepare("SELECT * FROM `configuracion_contenedor`");
        $query->execute();
        return $query;
    }

    function obtener_contenido(){
        $query = $this->conexion->prepare("SELECT * FROM `contenedor` ORDER BY Id_cont desc limit 1");
        $query->execute();
        return $query;
    }

    function obtener_aguas(){
        $query = $this->conexion->prepare("SELECT * FROM `bebedero` ORDER BY Id_agua desc limit 1");
        $query->execute();
        return $query;
    }
}


?>