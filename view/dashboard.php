<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-5.2.0-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/dashboard.css" rel="stylesheet" />
    <script src="../bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.2/chart.min.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <title>Porkino</title>
</head>
<body  onload='draw(0);' class="text-center">
    <div class="container">
        <p class="mt-5">
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">
    <img src="../src/img/2132817.png" width="100px" height="100px"/>
  </button>
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">
    <img src="../src/img/1055644.png" width="100px" height="100px" />
  </button>
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample3">
    <img src="../src/img/forbidden.png" width="100px" height="100px" />
  </button>
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample4" aria-expanded="false" aria-controls="multiCollapseExample4">
    <img src="../src/img/306433.png" width="100px" height="100px" />
  </button>
</p>
<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">
        <div class="row">
          <div class="col-12 mb-2">
          <div class="form-floating">
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
              <option selected>Seleccione el Comedero</option>
              <option value="1">COMEDERO 1</option>
              <option value="2">COMEDERO 2</option>
            </select>
            <label for="floatingSelect">Control de comederos</label>
          </div>
          </div>
          <div class="col">
            <div class="GaugeMeter" id="GaugeMeter_1" data-percent="10"></div>
            <div> Nivel de Comida</div>
          </div>
          <div class="col">
            <div class="GaugeMeter" id="GaugeMeter_1" data-percent="100"></div>
            <div> Estado de Agua</div>
          </div>
        </div>
    </div>
</div>
    <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body">
        <div class="h3">Sistema de Reporte</div>
        <form class="text-center" action="#" method="POST">
        <div class="row">
          <div class="col">
          <div class="form-floating">
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
              <option selected>Seleccione el Comedero</option>
              <option value="1">COMEDERO 1</option>
              <option value="2">COMEDERO 2</option>
            </select>
            <label for="floatingSelect">Control de comederos</label>
          </div>
          </div>
          <div class="col">
          <div class="form-floating mb-3">
            <input type="date" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Fecha Inicio</label>
          </div>
          </div>
          <div class="col">
          <div class="form-floating mb-3">
            <input type="date" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Fecha Final</label>
          </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Generar reporte</button>
        </form>

        <canvas id="myChart" width="200" height="200"></canvas>

      </div>
    </div>
    <div class="collapse multi-collapse" id="multiCollapseExample3">
      <div class="card card-body">
        <form action="#" method="POST">
        <button type="submit" class="btn btn-primary mb-3">Nuevo Proveedor</button>
        </form>
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Proveedor 1</h5>
            <small>Fecha de contrato: 12/12/12 <button type="submit" class="btn btn-danger">X</button></small>
          </div>
          <p class="mb-1">Este proveedor nos proporciona un producto</p>
          <small>contacto: (+593)-9283746573 - correo: proveedor1@dominio.extension</small>
        </a>
        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Proveedor 2</h5>
            <small>Fecha de contrato: 12/12/12 <button type="submit" class="btn btn-danger">X</button></small>
          </div>
          <p class="mb-1">Este proveedor nos proporciona otro producto</p>
          <small>contacto: (+593)-9283746573 - correo: proveedor2@dominio.extension</small>
        </a>
        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Proveedor 3</h5>
            <small>Fecha de contrato: 12/12/12 <button type="submit" class="btn btn-danger">X</button></small>
          </div>
          <p class="mb-1">Este proveedor nos proporciona uno diferente producto</p>
          <small>contacto: (+593)-9283746573 - correo: proveedor3@dominio.extension</small>
        </a>
      </div>
      </div>
    </div>
    <div class="collapse multi-collapse" id="multiCollapseExample4">
      <div class="card card-body">
      <form class="row g-3 text-center">
        <div class="col">
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" placeholder="12">
          <label for="floatingInput">Ingrese tiempo de dosificacion en horas</label>
        </div>
        </div>
        <div class="col">
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" placeholder="12">
          <label for="floatingInput">Ingrese el tamaño del contenedor de alimento en cm</label>
        </div>
        </div>
          <button type="submit" class="btn btn-primary mb-3">Actualizar datos</button>
      </form>
      </div>
    </div>
  </div>
</div>
<script src="../js/speedmeter.js"></script>
<script src="../js/dashboard.js"></script>
</body>
</html>