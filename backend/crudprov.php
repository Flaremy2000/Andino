<?php

include 'proveedor.php';

$prov = new proveedor();

header('Content-type: application/json');

//Ver Usuarios

if($_SERVER['REQUEST_METHOD']== 'GET' && isset($_GET['proveedor'])){

    $datos = array();

    $result = $prov->obtener_proveedores();

    if ($result->rowCount()){
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'mensaje' => "datos",
                    'id' => $row['Id_prov'],
                    'nombre' => $row['nom_prov'],
                    'description' => $row['description'],
                    'contacto' => $row['contacto'],
                    'correo' => $row['correo'],
                    'empresa' => $row['empresa'],
                    'imagen' => $row['imagen'],
                    'estado' => $row['estado']
                );
                array_push($datos, $item);
        }
    }else{
        $item = array(
            'mensaje' => "sp",
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

    $result = $prov->editar_proveedor($id, $nombre, $apellido, $nick, $correo, $clave, $estado);

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

    $result = $prov->guardar_proveedor($nombre, $apellido, $nick, $correo, $clave, $estado);

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

    $result = $prov->eliminar_proveedor($id);

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