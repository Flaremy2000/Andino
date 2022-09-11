<?php

include_once 'usuario.php';

$index = new usuario();

if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['formpass'])){

    $id = $_POST['id'];
    $contra = $_POST['contra'];
    $contrarept = $_POST['contra_re'];

    if($contra == $contrarept){
        $result = $index->editar_pass($id, password_hash($contra, PASSWORD_DEFAULT));
        if($result){
            header('Location: /');
        }else{
            header('Location: ../backend/changepass.php?e&id='.$id);
        }
    }else{
        header('Location: ../backend/changepass.php?en&id='.$id);
    }

}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-5.2.0-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/index.css" rel="stylesheet" />
    <script src="../bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../src/img/cerdologo.webp">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <title>Porkino</title>
</head>
<body class="text-center">
    <main class="form-signin w-100 m-auto">
        <form id="loginFm" action="../backend/changepass.php" method="POST">
            <img class="mb-1" src="/src/img/cerdologo.webp" alt="" width="172" height="172">
            <h1 class="h2 mb-5">PORKINO S.A.</h1>
            <h1 class="h3 mb-2 fw-normal">Cambio de Contraseña</h1>
            <div class="form-floating">
                <input type="password" class="form-control" id="contra" placeholder="name@example.com" name="contra">
                <label for="contra">Nueva Contraseña</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="contra_re" placeholder="Password" name="contra_re">
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" >
                <label for="contra_re">Repetir Contraseña</label>
            </div>
            <button class="w-100 btn btn-lg btn-danger" type="submit" name="formpass" >Cambiar</button>      
        </form>
    </main>
    <?php 
    if(isset($_GET['en'])){
        echo '<script>alert("Las contraseñas no coinciden")</script>';
    }elseif(isset($_GET['e'])){
        echo '<script>alert("No se actualizo la contraseña")</script>';
    }
     ?>
<script src="js/change.js"></script>
</body>
</html>