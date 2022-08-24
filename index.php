<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap-5.2.0-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/index.css" rel="stylesheet" />
    <script src="bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <title>Porkino</title>
</head>
<body class="text-center">
    <main class="form-signin w-100 m-auto">
  <form id="loginFm" method="POST">
    <img class="mb-4" src="/src/img/cerdologo.webp" alt="" width="172" height="172">
    <h1 class="h3 mb-3 fw-normal">Inicie Sesion</h1>
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
</main>
<script src="js/index.js"></script>
</body>
</html>