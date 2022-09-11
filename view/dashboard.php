<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-5.2.0-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/dashboard.css" rel="stylesheet" />
    <script src="../bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="src/img/cerdologo.webp">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <title>Porkino</title>
</head>
<body class="text-center">
    <div class="container">
      <div class="d-flex align-items-end flex-column bd-highlight mb-1">
        <div class="p-2 bd-highlight mt-2">
          <input type="button" class="btn btn-danger" id="closesession" value="Desconectase">
        </div>
      </div>
      <p id="mygrupo" class="mt-5 mb-2">
        <button id="comida" class="btn btn-primary mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">
          <img src="../src/img/2132817.png" width="100px" height="100px"/>
        </button>
        <button id="reporte" class="btn btn-primary mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">
          <img src="../src/img/1055644.png" width="100px" height="100px" />
        </button>
        <button id="prooveedor" class="btn btn-primary mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample3">
          <img src="../src/img/forbidden.png" width="100px" height="100px" />
        </button>
        <button id="users" class="btn btn-primary mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample4" aria-expanded="false" aria-controls="multiCollapseExample4">
          <img src="../src/img/219986.png" width="100px" height="100px" />
        </button>
        <button id="configuracion_general" class="btn btn-primary mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample5" aria-expanded="false" aria-controls="multiCollapseExample5">
          <img src="../src/img/306433.png" width="100px" height="100px" />
        </button>
      </p>
      <div class="row">
        <div class="col">
      <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">
        <div class="row">
          <div class="col-12 mb-2">
            <p class="h3 border-bottom mb-2">ESTADO DE ALIMENTO Y BEBIDA</p>
          </div>
          <div class="col">
            <div class="GaugeMeter" id="GaugeMeter_1" style="margin-left: auto; margin-right: auto;"></div>
            <div> Contenedor de Alimento</div>
          </div>
          <div class="col">
          <div class="GaugeMeter" id="GaugeMeter_gua" style="margin-left: auto; margin-right: auto;"></div>
            <!-- <div id="bolaagu" class=""></div> -->
            <div class="mt-2"> Estado de Agua</div>
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
          <div class="form-floating mb-3">
            <input type="date" class="form-control" id="fecha_ini" placeholder="name@example.com" min="2022-08-17">
            <label for="fecha_ini">Fecha Inicio</label>
          </div>
          </div>
          <div class="col">
          <div class="form-floating mb-3">
            <input type="date" class="form-control" id="fecha_fin" placeholder="name@example.com" min="2022-08-17">
            <label for="fecha_fin">Fecha Final</label>
          </div>
          </div>
        </div>
        <a class="btn btn-primary mb-3" id="btrepr">Generar reporte</a>
        </form>

        <img id="showreport">

        <a id="downloadbt" class="btn btn-info mb-3 disabled" download="Informe">Descargar Reporte</a>

      </div>
    </div>
      <div class="collapse multi-collapse" id="multiCollapseExample3">
      <div class="card card-body">
      <p class="h3 text-center mb-4 border-bottom">GESTION DE PROVEEDORES</p>
        <form action="#" method="POST">
        <a id="crearprov" class="btn btn-primary mb-3">REGISTRAR PROVEEDOR</a>
        </form>
        <div id="listprov" class="row row-cols-1 row-cols-md-2 g-4"></div>
    </div>
  </div>
      <div class="collapse multi-collapse" id="multiCollapseExample4">
      <div class="card card-body">
        <p class="h3 text-center mb-4 border-bottom">GESTION DE USUARIO</p>
        <form method="POST">
        <a id="crearuser" class="btn btn-primary mb-3">REGISTRAR USUARIO</a>
        </form>
      <div class="list-group">
        <div class="row" id="lista_user"></div>
      </div>
      </div>
    </div>
      <div class="collapse multi-collapse" id="multiCollapseExample5">
      <div class="card card-body">
      <form class="row g-3 text-center" id="Formconfig" method="GET">
        <p class="h3 border-bottom">CONTROL DE DOSIFICACION</p>
        <div class="col">
        <div class="form-floating mb-3">
          <input type="datetime-local" class="form-control" id="Fechasdosificador" placeholder="12">
          <label for="Fechasdosificador">Ingrese fecha a dosificar</label>
        </div>
        </div>
          <button type="submit" class="btn btn-primary mb-3" id="registro_fecha">Registrar fecha</button>
      </form>
      </div>
      <div class="card card-body mt-2">
      <form class="row g-3 text-center" id="AguaConfig">
        <p class="h3 border-bottom">ENCENDIDO MANUAL DE AGUA</p>
        <div class="col">
          <input type="button" class="btn btn-primary mb-3" value="ENCENDER" id="BtnAgua"></input>
        </div>
      </form>
      </div>
    </div>
    </div>
  </div>

  <!--------- MODALES --->

  <!--- Crear Usuario ---->
  <div class="modal fade" id="modalnuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4>REGISTRAR NUEVO USUARIO</h4>
          <input type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </div>
        <div class="modal-body">
          <form role="form" method="post" id="form2" name="form2">
            <!-- Nombre -->
            <div class="form-floating">
              <input class="form-control mb-3" placeholder="Ingrese el nombre" id="nombre" name="nombre" type="text" required>
              <label for="nombre">Nombre</label>
            </div>
            <!-- Apellido -->
            <div class="form-floating">
              <input class="form-control mb-3" placeholder="Ingrese los apellidos" id="apellido" name="apellido" type="text" required>
              <label for="apellido">Apellidos</label>
            </div>
            <!-- Nick -->
            <div class="form-floating">
              <input class="form-control mb-3" placeholder="Ingrese su nick" id="nick" name="nick" type="text" required>
              <label for="nick">Nick</label>
            </div>
            <!-- Correo -->
            <div class="form-floating">
              <input class="form-control mb-3" placeholder="Ingrese su correo" id="correo" name="correo" type="email" required>
              <label for="correo">Correo</label>
            </div>
            <div class="form-floating">
              <input class="form-control mb-3" placeholder="Ingrese su contraseña" id="clave" name="clave" type="password" required>
              <label for="clave">Contraseña</label>
            </div>
            <!-- CARGO -->
            <div class="form-floating">
              <select class="form-select mb-3" id="cargo" name="cargo">
                <option value="1">ADMINISTRADOR</option>
                <option value="2">TRABAJADOR</option>
              </select>
              <label for="cargo">Cargo</label>
            </div>
              </form>
              </div>
              <div class="modal-footer">
              <a class="btn btn-info" onclick="guardar_usuario();">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
              </svg>
              Guardar
            </a>
              </div>
          </div>
      </div>
  </div>
  
  <!--- Crear Proveedor ---->
  <div class="modal fade" id="modalprovcre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4>REGISTRAR NUEVO PROVEEDOR</h4>
          <input type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </div>
        <div class="modal-body">
          <form role="form" action="../backend/crudprov.php?cpro" method="POST" id="cprovid" name="cprovid" enctype="multipart/form-data">
            <!-- Nombre Proveedor-->
            <div class="form-floating">
              <input class="form-control mb-3" placeholder="Ingrese el nombre del proveedor" id="nombre_pro" name="nombre_pro" type="text" required>
              <label for="nombre_pro">Nombre Proveedor</label>
            </div>
            <!-- Contacto -->
            <div class="form-floating">
              <input class="form-control mb-3" placeholder="Ingrese el numero de contacto" id="contacto_prov" name="contacto_prov" type="text" required>
              <label for="contacto_prov">Contacto</label>
            </div>
            <!-- Correo -->
            <div class="form-floating">
              <input class="form-control mb-3" placeholder="Ingrese su correo" id="correo_prov" name="correo_prov" type="email" required>
              <label for="correo_prov">Correo</label>
            </div>
            <!-- empresa -->
            <div class="form-floating">
              <input class="form-control mb-3" placeholder="Ingrese la empresa asociada" id="empresa_prov" name="empresa_prov" type="text" required>
              <input id="imagen_vieja" name="imagen_vieja" type="hidden" required>
              <input id="id_pro" name="id" type="hidden" required>
              <label for="empresa_prov">Empresa</label>
            </div>
            <!-- Descripcion --->
            <div class="form-floating">
              <textarea class="form-control mb-3" placeholder="Escribe una descripcion corta" id="descripcion" name="descripcion" style="height: 100px"></textarea>
              <label for="descripcion">Descripcion</label>
            </div>
            <div class="mb-3">
              <label for="title_prov" class="form-label">Imagen de la empresa</label>
              <input class="form-control" type="file" id="title_prov" name="title_prov" >
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <a class="btn btn-info" onclick="guardar_proveedor()">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
            <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
          </svg>
          Guardar
        </a>
      </div>
    </div>
  </div>
</div>
  
  <!--- Editar Usuario ---->
  <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4>EDITAR INFORMACION DE USUARIO</h4>
          <input type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </div>
        <div class="modal-body">
          <form role="form" method="post" id="form3" name="form3">
            <!-- Nombre -->
            <div class="form-floating">
              <input class="form-control mb-3" placeholder="Ingrese el nombre" id="enombre" name="nombre" type="text" required>
              <label for="enombre">Nombres</label>
            </div>
            <!-- Apellido -->
            <div class="form-floating">
              <input class="form-control mb-3" placeholder="Ingrese los apellidos" id="eapellido" name="apellido" type="text" required>
              <label for="eapellido">Apellidos</label>
            </div>
            <!-- Nick -->
            <div class="form-floating">
              <input class="form-control mb-3" placeholder="Ingrese su nick" id="enick" name="nick" type="text" required>
              <input id="eid" name="eid" type="hidden" required>
              <label for="enick">Nick</label>
            </div>
            <!-- Correo -->
            <div class="form-floating">
              <input class="form-control mb-3" placeholder="Ingrese su correo" id="ecorreo" name="correo" type="email" required>
              <label for="ecorreo">Correo</label>
            </div>
            <div class="form-floating">
              <input class="form-control mb-3" placeholder="Ingrese su contraseña" id="eclave" name="clave" type="password" required>
              <label for="eclave">Contraseña</label>
            </div>
            <!-- CARGO -->
            <div class="form-floating">
              <select class="form-select mb-3" id="ecargo" name="cargo">
                <option value="1">ADMINISTRADOR</option>
                <option value="2">TRABAJADOR</option>
              </select>
              <label for="ecargo">Cargo</label>
            </div>
              </form>
              </div>
              <div class="modal-footer">
              <a class="btn btn-info" onclick="modificar_datos()">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
              </svg>
              Editar
            </a>
              </div>
          </div>
      </div>
  </div>
 
  <!--- Editar Proveedor ---->
  <div class="modal fade" id="modalproved" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4>EDITAR PROVEEDOR</h4>
          <input type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </div>
        <div class="modal-body">
          <form role="form" action="../backend/crudprov.php?edprov" method="POST" id="fomi" name="fomi" enctype="multipart/form-data" >
            <!-- Nombre Proveedor-->
            <div class="form-floating">
              <input class="form-control mb-3" placeholder="Ingrese el nombre del proveedor" id="enombre_pro" name="nombre_pro" type="text" required>
              <label for="enombre_pro">Nombre Proveedor</label>
            </div>
            <!-- Contacto -->
            <div class="form-floating">
              <input class="form-control mb-3" placeholder="Ingrese el numero de contacto" id="econtacto_prov" name="contacto_prov" type="text" required>
              <label for="econtacto_prov">Contacto</label>
            </div>
            <!-- Correo -->
            <div class="form-floating">
              <input class="form-control mb-3" placeholder="Ingrese su correo" id="ecorreo_prov" name="correo_prov" type="email" required>
              <label for="ecorreo_prov">Correo</label>
            </div>
            <!-- empresa -->
            <div class="form-floating">
              <input class="form-control mb-3" placeholder="Ingrese la empresa asociada" id="eempresa_prov" name="eempresa_prov" type="text" required>
              <label for="eempresa_prov">Empresa</label>
              <input id="eid_pro" name="id" type="hidden" required>
              <input id="eimagen_vieja" name="imagen_vieja" type="hidden" required>
            </div>
            <!-- Descripcion --->
            <div class="form-floating">
              <textarea class="form-control mb-3" placeholder="Escribe una descripcion corta" id="edescripcion" name="edescripcion" style="height: 100px"></textarea>
              <label for="edescripcion">Descripcion</label>
            </div>
            <div class="mb-3">
              <label for="etitle_prov" class="form-label">Imagen de la empresa</label>
              <input class="form-control " type="file" id="etitle_prov" name="etitle_prov" >
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <a class="btn btn-info" onclick="modificar_datos_proveedor()">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
            <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
          </svg>
          Editar
        </a>
      </div>
    </div>
  </div>
</div>

  <!--- Eliminar Usuario ---->
  <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4>ELIMINAR USUARIO</h4>
          <input type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </div>
        <div class="modal-body">
          <form role="form" method="post" id="form4" name="form4">
            <label class="h3">Esta seguro que desea eliminar al usuario?</label>
            <input id="elid" name="elid" type="hidden" required>
          </form>
        </div>
        <div class="modal-footer">
          <a class="btn btn-danger" onclick="eliminar_usuario()">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
          </svg>
          Eliminar
        </a>
      </div>
    </div>
  </div>
</div>
 
<!--- Eliminar Proveedor ---->
  <div class="modal fade" id="modalprovel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4>ELIMINAR PROVEEDOR</h4>
          <input type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </div>
        <div class="modal-body">
          <form role="form" method="post" id="fos" name="fos">
            <label class="h3">Esta seguro que desea eliminar al proveedor?</label>
            <input id="elpr" name="elpr" type="hidden" required>
          </form>
        </div>
        <div class="modal-footer">
          <a class="btn btn-danger" onclick="eliminar_proveedor()">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
          </svg>
          Eliminar
        </a>
      </div>
    </div>
  </div>
</div>


<script src="../js/speedmeter.js"></script>
<script src="../js/dashboard.js"></script>
</body>
</html>