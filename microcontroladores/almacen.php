<?php

include_once "../visualizador.php";
$visual = new visualizador();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['micro'])){
    
    
    $micro = $_GET['micro'];
    $estado = $_GET['estado'];
    

    $conf = $visual->guardar_bebedero($micro, $estado);

}



?>