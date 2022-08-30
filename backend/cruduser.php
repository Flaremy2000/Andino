<?php

include 'usuario.php';

$user = new usuario();

header('Content-type: application/json');

//Ver Usuarios

if($_SERVER['REQUEST_METHOD']== 'GET' && isset($_GET['usuarios'])){

    $datos = array();

    $result = $user->obtener_usuarios();

    if ($result->rowCount()){
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'mensaje' => "datos",
                    'id' => $row['Id_us'],
                    'nombre' => $row['nombre'],
                    'apellido' => $row['apellido'],
                    'nick' => $row['nick'],
                    'correo' => $row['correo'],
                    'estado' => $row['estado']
                );
                array_push($datos, $item);
        }
    }else{
        $item = array(
            'mensaje' => "su",
        );
        array_push($datos, $item);
    }

    printJSON($datos);
}

//Editar usuarios

if($_SERVER['REQUEST_METHOD']== 'GET' && isset($_GET['eid'])){

    $datos = array();
    $id = $_GET['eid'];
    $nombre = $_GET['nombre'];
    $apellido = $_GET['apellido'];
    $nick = $_GET['nick'];
    $correo = $_GET['correo'];
    $clave = password_hash($_GET['clave'], PASSWORD_DEFAULT);
    $estado = $_GET['estado'];

    if($clave != null){
        $result = $user->editar_usuario($id, $nombre, $apellido, $nick, $correo, $clave, $estado);
    }else{
        $result = $user->editar_usuario_sc($id,$nombre, $apellido, $nick, $correo, $estado);
    }

    if($result){
        $item = array(
            'mensaje' => "ued",
        );
        array_push($datos, $item);
    }else{
        $item = array(
            'mensaje' => "uned",
        );
        array_push($datos, $item);
    }
    printJSON($datos);
}

// Crear usuarios

if($_SERVER['REQUEST_METHOD']== 'GET' && isset($_GET['cnombre'])){

    $datos = array();
    $nombre = $_GET['cnombre'];
    $apellido = $_GET['apellido'];
    $nick = $_GET['nick'];
    $correo = $_GET['correo'];
    $clave = password_hash($_GET['clave'], PASSWORD_DEFAULT);
    $estado = $_GET['estado'];

    $result = $user->guardar_usuario($nombre, $apellido, $nick, $correo, $clave, $estado);

    if($result){
        $item = array(
            'mensaje' => "uc",
        );
        array_push($datos, $item);
    }else{
        $item = array(
            'mensaje' => "unc",
        );
        array_push($datos, $item);
    }
    printJSON($datos);
}

//Eliminar usuarios

if($_SERVER['REQUEST_METHOD']== 'GET' && isset($_GET['elid'])){

    $datos = array();
    $id = $_GET['elid'];

    $result = $user->eliminar($id);

    if($result){
        $item = array(
            'mensaje' => "eli",
        );
        array_push($datos, $item);
    }else{
        $item = array(
            'mensaje' => "noel",
        );
        array_push($datos, $item);
    }
    printJSON($datos);
}

function error($mensaje){
    print_r(json_encode(array('mensaje' => $mensaje)));
}

function printJSON($array){
    print_r(json_encode($array));
}

?>