<?php

include_once "../visualizador.php";
$visual = new visualizador();

date_default_timezone_set("America/Guayaquil");

$date = date("Y-m-d H:i");

$inicio = $date.":00";
$fin = $date.":59";
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['config'])){
    
    $conf = $visual->obtener_configuracion($inicio, $fin);
    $dar = 0;
    $dia = 0;
    $mes = 0;
    $anio = 0;
    $hora = 0;
    $minuto = 0;
    if ($conf->rowCount()){
        while ($row = $conf->fetch(PDO::FETCH_ASSOC)){
            $dia = $row['dia'];
            $mes = $row['mes'];
            $anio = $row['anio'];
            $hora = $row['hora'];
            $minuto = $row['minuto'];
        }
        $fecha = $anio."-".$mes."-".$dia." ".$hora.":".$minuto;
        if($fecha != '0-0-0 0:0'){
            $dar = 1;
        }
    }else{
        $dar = 0;
    }
    
    echo "dar=".$dar.";";
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['dosif'])){

    header('Content-type: application/json');

    $fechafinal = "";
    $parametros = array();
    
    $fecha_fin = $visual->obtener_ultimados();

    if ($fecha_fin->rowCount()){
        while ($row = $fecha_fin->fetch(PDO::FETCH_ASSOC)){
            $fechafinal = $row['tiempo_llenar'];
        }
    }

    $conf = $visual->obtener_dosificaciones($inicio, $fechafinal);

    if ($conf->rowCount()){
        while ($row = $conf->fetch(PDO::FETCH_ASSOC)){
            $item = array(
                'mensaje'=> 'de',
                'fecha' => $row['tiempo_llenar']
            );
            array_push($parametros, $item);
        }
    }else{
        array_push($parametros, array('mensaje'=> 'nd'));
    }
    printJSON($parametros);
}



if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['aguas'])){
    
    $conf = $visual->obtener_estado_aguas();
    $dar = 0;

    if ($conf->rowCount()){
        while ($row = $conf->fetch(PDO::FETCH_ASSOC)){
            $dar = $row['estado'];
        }
    }else{
        $dar = 0;
    }
    
    echo "agua=".$dar.";";
}

function printJSON($array){
    print_r(json_encode($array));
}
?>

