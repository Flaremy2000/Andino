<?php 

include_once 'logueo.php';

$index = new logueo();

if($_SERVER['REQUEST_METHOD']== 'GET' && isset($_GET['correo'])){

    $cedula = $_GET['correo'];
    $pass = $_GET['pass'];


    $result = $index->obtener_logueo($cedula);
    if ($result->rowCount()){
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            if(password_verify($pass, $row['contrasena'])){
                echo 'si';
            }else{
                echo 'no';
            }
        }
    }else{
        echo 'no 2';
    }
}

?>