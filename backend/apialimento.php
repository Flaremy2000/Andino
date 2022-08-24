<?php 

include_once "../visualizador.php";
date_default_timezone_set("America/Guayaquil");
$date = date("Y-m-d H:i:s");
header('Content-type: application/json');

$visual = new visualizador();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['micro'])){

    $micro =$_GET['micro'];

    $parametros = array();
    $tem = $visual->obtener_contenido();

    if ($tem->rowCount()){
        while ($row = $tem->fetch(PDO::FETCH_ASSOC)){
            $item = array(
                'micro' => $row['micro'],
                'llenura' => $row['llenura']
            );
        }
        array_push($parametros, $item);
    }
    printJSON($parametros);
}

function error($mensaje){
    print_r(json_encode(array('mensaje' => $mensaje)));
}

function printJSON($array){
    print_r(json_encode($array));
}

?>