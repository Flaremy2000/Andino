<?php

include_once "../visualizador.php";
$visual = new visualizador();

date_default_timezone_set("America/Guayaquil");

$date = date("Y-m-d H:i");

$inicio = $date.":00";
$fin = $date.":59";

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['config'])){
    
    $conf = $visual->obtener_configuracion($inicio, $fin);
    $cofdis = $visual->obtener_distancia();
    $dar = 0;
    $dia = 0;
    $mes = 0;
    $anio = 0;
    $hora = 0;
    $minuto = 0;
    $dist = 0;
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
    if ($cofdis->rowCount()){
        while ($row = $cofdis->fetch(PDO::FETCH_ASSOC)){
            $dist = $row['tamano'];
        }
    }else{
        $dist = 0;
    }
    
    echo "dar=".$dar."; dist=".$dist.";";
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['micro'])){
    $aparte = date("Y-m-d H:i:s");
    
    $micro = $_GET['micro'];
    $llenado = $_GET['llenado'];
    
    $conf = $visual->guardar_contenido($micro, $llenado, $aparte);

}

?>