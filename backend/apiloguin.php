<?php 

include_once 'logueo.php';

$index = new logueo();

header('Content-type: application/json');

if($_SERVER['REQUEST_METHOD']== 'GET' && isset($_GET['correo'])){

    $cedula = $_GET['correo'];
    $pass = $_GET['pass'];
    $datos = array();

    $result = $index->obtener_logueo($cedula);
    if ($result->rowCount()){
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            if(password_verify($pass, $row['contrasena'])){
                $item = array(
                    'mensaje' => "datos",
                    'id' => $row['Id_us'],
                    'nombre' => $row['nombre'],
                    'apellido' => $row['apellido'],
                    'nick' => $row['nick'],
                    'correo' => $row['correo'],
                    'estado' => $row['estado']
                );
            }else{
                $item = array(
                    'mensaje' => "passE",
                );
            }
        }
    }else{
        $item = array(
            'mensaje' => "usE",
        );
    }

    array_push($datos, $item);

    printJSON($datos);
}

function error($mensaje){
    print_r(json_encode(array('mensaje' => $mensaje)));
}

function printJSON($array){
    print_r(json_encode($array));
}

?>