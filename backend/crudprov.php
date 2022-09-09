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

if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_GET['edprov'])){

    $datos = array();
    $id = $_POST['id'];
    $nombre = $_POST['nombre_pro'];
    $contacto = $_POST['contacto_prov'];
    $correo = $_POST['correo_prov'];
    $empresa = $_POST['eempresa_prov'];
    $description = $_POST['edescripcion'];
    $imagen_temp = $_FILES['etitle_prov']['tmp_name'];
    $imagen_name = $_FILES['etitle_prov']['name'];
    $imagen_vieja = $_POST['imagen_vieja'];

    if(move_uploaded_file($imagen_temp, "../src/img/empresas/".basename($imagen_name))){
        $result = $prov->editar_proveedor($id, $nombre, $description, $contacto, $correo, $empresa, $imagen_name);
    }else{
        $result = $prov->editar_proveedor_si($id, $nombre, $description, $contacto, $correo, $empresa);
    }

    if($result){
        header("Location: /");
    }else{
        header("Location: /e");
    }
}

// Crear usuarios

if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_GET['cpro'])){

    $datos = array();
    $nombre = $_POST['nombre_pro'];
    $contacto = $_POST['contacto_prov'];
    $correo = $_POST['correo_prov'];
    $empresa = $_POST['empresa_prov'];
    $description = $_POST['descripcion'];
    $imagen_temp = $_FILES['title_prov']['tmp_name'];
    $imagen_name = $_FILES['title_prov']['name'];

    if(move_uploaded_file($imagen_temp, "../src/img/empresas/".basename($imagen_name))){
        $result = $prov->guardar_proveedor($nombre, $description, $contacto, $correo, $empresa, $imagen_name);
    }else{
        $result = false;
    }

    if($result){
        header("Location: /");
    }else{
        header("Location: /?e");
    }
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