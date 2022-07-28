<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-5.2.0-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/dashboard.css" rel="stylesheet" />
    <script src="../bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <title>Porkino</title>
</head>
<body  onload='draw(0);'>
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
</p>
<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">
        <canvas id="speedometer" width="880" height="440">Canvas not available.</canvas>
        <div>
            <form id="drawTemp">
                <input type="text" id="txtSpeed" name="txtSpeed" value="20" maxlength="2"/>
                <input type="button" value="Draw">
            </form>
        </div>  
    </div>
</div>
    <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body">
        Segunda opcion
      </div>
    </div>
    <div class="collapse multi-collapse" id="multiCollapseExample3">
      <div class="card card-body">
        Tercero opcion
      </div>
    </div>
  </div>
</div>
<script src="../js/speedmeter.js"></script>
<script src="../js/dashboard.js"></script>
</body>
</html>