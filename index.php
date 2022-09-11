<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap-5.2.0-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/index.css" rel="stylesheet" />
    <script src="bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="src/img/cerdologo.webp">
    <script src="js/jquery-3.6.0.min.js"></script>
    <title>Porkino</title>
</head>
<body class="text-center">
    <main class="form-signin w-100 m-auto">
  <form id="loginFm" method="POST">
    <img class="mb-1" src="/src/img/cerdologo.webp" alt="" width="172" height="172">
    <h1 class="h2 mb-5">PORKINO S.A.</h1>
    <h1 class="h3 mb-2 fw-normal">Inicie Sesion</h1>
    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="correo">
      <label for="floatingInput">Correo</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass">
      <label for="floatingPassword">Contraseña</label>
    </div>
    <!-- 
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <button id="Btnlogin" class="w-100 btn btn-lg btn-danger" type="submit">Iniciar</button>      
    </form>
    <div class="mt-2">
      <label class="muted-2">Ha olvidado su contraseña? <a id="obtenerpass" class="text">Recuperar</a></label>
    </div>
</main>

<div class="modal fade" id="modalrec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Cambiar Contraseña</h4>
          <input type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </div>
        <div class="modal-body">
          <form role="form" method="post" id="form4" name="form4">
            <div class="form-floating">
              <input class="form-control" placeholder="Ingrese su correo" id="nick" name="nick" type="text" required>
              <label for="nick" class="h3">Correo</label>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <a class="btn btn-info" onclick="enviar_correo();">
          <div class="" id="content_btn">
          </div>
        </a>
      </div>
    </div>
  </div>
</div>

<script src="js/index.js"></script>
</body>
</html>