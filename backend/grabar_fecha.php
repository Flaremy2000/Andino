<?php

include_once "../visualizador.php";
$visual = new visualizador();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['fecha'])){
    
    
    $fecha = $_GET['fecha'];
    

    $conf = $visual->guardar_fecha($fecha);

    if($conf){
        echo "si";
    }else{
        echo "no";
    }


}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['estado_agua'])){    

    $conf = $visual->obtener_estado_aguas();

    if ($conf->rowCount()){
        while ($row = $conf->fetch(PDO::FETCH_ASSOC)){
            if($row['estado'] == 1){
                $estado = $visual->cambiar_estado(0);
            }else if($row['estado'] == 0){
                $estado = $visual->cambiar_estado(1);
            }

            if($estado){
                echo "si";
            }else{
                echo "no";
            }
        }
    }


}
