$(document).ready(function(){

    var cargo = '';

    if(window.sessionStorage){
        if(sessionStorage.getItem("id") == null){
            alert("No has iniciado sesion debes iniciar sesion para acceder a las funciones");
            window.location.href = '/';
        }else{
            if(sessionStorage.getItem("estado") == '2'){
                $('#multiCollapseExample2').remove();
                $('#multiCollapseExample3').remove();
                $('#multiCollapseExample4').remove();
                $('#reporte').remove();
                $('#prooveedor').remove();
                $('#users').remove();
            }
        }
    }else{
        throw new Error('Tu Browser no soporta sessionStorage!');
    }
    
    obtener_comida(5000);
    obtener_agua(5000);

    $('#registro_fecha').on('click', registrar_fecha);
    $('#BtnAgua').on('click', cambiar_estado_agua);
    
    $('button').click( (e)=> {
        $('.collapse').collapse('hide');
    });
    
    $('#closesession').click( (e)=> {
        sessionStorage.removeItem("id");
        sessionStorage.removeItem("nombre");
        sessionStorage.removeItem("apellido");
        sessionStorage.removeItem("nick");
        sessionStorage.removeItem("correo");
        sessionStorage.removeItem("estado");
        window.location.href = '/';
    });

    $('#crearuser').click((e)=>{
        $("#modalnuevo").modal('show');
    });
    $('#crearprov').click((e)=>{
        $("#modalprovcre").modal('show');
    });
    
    $('#btrepr').click((e)=>{
        e.preventDefault();
        $('#downloadbt').addClass('disabled');
        generar_reporte();
    });

    

    obtener_usuarios(cargo);
    obtener_proveedores();

});
// Se obtiene la ultima entrada de comida del sistema
function obtener_comida(tiempo){
    setInterval(()=>{
        $.ajax({
            url: '../backend/apialimento.php?micro',
            method: 'get',
            dataType: 'json',
            success: (res)=>{
                $.each(res, (index, item)=>{
                    $("#GaugeMeter_1").gaugeMeter({percent:item.llenura});
                });
            }
        });
    }, tiempo);
}

// Se obtiene la ultima entrada de comida del sistema
function obtener_agua(tiempo){
    setInterval(()=>{
        $.ajax({
            url: '../backend/apialimento.php?agua',
            method: 'get',
            dataType: 'json',
            success: (res)=>{
                $.each(res, (index, item)=>{
                    if(item.estado == '0'){
                        $("#GaugeMeter_gua").gaugeMeter({percent:5});
                    }else if(item.estado == '1'){
                        $("#GaugeMeter_gua").gaugeMeter({percent:95});
                    }
                });
            }
        });
    }, tiempo);
}
// Fechas de dosificaciones
function registrar_fecha(){
    $('#Formconfig').submit((event)=>{
        event.preventDefault();
    });
    $.ajax({
        url: '../backend/grabar_fecha.php?fecha='+ $('#Fechasdosificador').val(),
        method: 'get',
        dataType: 'text',
        success: (res)=>{
            if(res == "si"){
                alert("Siguiente fecha de dosificacion guardada con exito");
                $('#Fechasdosificador').val("");
            }else{
                alert("Error al guardar la fecha de dosificacion");
            }
        }
    });
}
// Cambiar estado de agua
function cambiar_estado_agua(){
    $('#AguaConfig').submit((event)=>{
        event.preventDefault();
    });
    $.ajax({
        url: '../backend/grabar_fecha.php?estado_agua',
        method: 'get',
        dataType: 'text',
        success: (res)=>{
            if(res == "si"){
                if($('#BtnAgua').attr('value') == "ENCENDER"){
                    $('#BtnAgua').attr('value', 'APAGAR');
                }else{
                    $('#BtnAgua').attr('value', 'ENCENDER');
                }

            }else{
                alert("Error al encender el agua");
            }
        }
    });
}
// Se muestra la lista de usuarios
function obtener_usuarios(cargo){
    $.ajax({
        url: '../backend/cruduser.php?usuarios',
        method: 'get',
        dataType: 'json',
        success: (res)=>{
            $.each(res, (index, item)=>{
                if(item.mensaje == 'su'){
                    $('#lista_user').append(`<div class="col text-center">
                    <div class="card mt-3" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">No existe usuarios registrados</h5>
                      <h6 class="card-subtitle mb-2 text-muted">Registre un usuario</h6>
                      </div>
                    </div>
                  </div>`);
                }else{
                    switch(item.estado){
                        case '0':
                            cargo = 'INACTIVO';
                            break;
                        case '1':
                            cargo = 'ADMINISTRADOR';
                            break;
                        case '2':
                            cargo = 'EMPLEADO';
                            break;
                    }
                    if(sessionStorage.getItem("id") != item.id){
                        $('#lista_user').append(`<div id='user${ item.id }' class="col text-center">
                        <div class="card mt-3" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">${ item.nombre + ' <br> ' + item.apellido }</h5>
                          <h6 class="card-subtitle mb-2 text-muted">${ item.nick }</h6>
                          <p class="card-text">correo: <br> ${ item.correo } <br> Cargo: ${ cargo }</p>
                          <a href="#" class="card-link btn btn-success" onclick="editar_usuario('${ item.id }','${item.nombre}', '${item.apellido}', '${item.nick}', '${item.correo}', '${item.estado}')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                              <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                          </a>
                          <a href="#" class="card-link btn btn-danger" onclick="eliminar('${ item.id }')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                          </a>
                          </div>
                        </div>
                      </div>`);
                    }
                }
            });
        }
    });

}
// Se muestra la lista de proveedores
function obtener_proveedores(){
    $.ajax({
        url: '../backend/crudprov.php?proveedor',
        method: 'get',
        dataType: 'json',
        success: (res)=>{
            $.each(res, (index, item)=>{
                if(item.mensaje == 'sp'){
                    $('#listprov').append(`<div class="col text-center">
                    <div class="card mb-3 text-center" style="max-width: 540px;">
                    <div class="row g-0" style="margin-left: auto;margin-right:auto;">
                      <div class="col">
                        <div class="card-body">
                          <h5 class="card-title">NO EXISTEN PROVEEDORES</h5>
                          <p class="card-text">INGRESE NUEVO PROVEEDOR</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>`);
                }else{
                    $('#listprov').append(`<div class="col">
                    <div class="card">
                        <img src="../src/img/empresas/${item.imagen}" class="card-img-top w-50 mt-2" alt="${item.empresa}" style="margin-left: auto;margin-right: auto;">
                        <div class="card-body">
                          <h5 class="card-title">${item.nombre} - ${item.empresa}</h5>
                          <p class="card-text">${item.description}</p>
                          <p class="card-text">
                          <small class="text-muted">contacto: (+593) - ${item.contacto} <br> correo: ${item.correo}</small></p>
                          <a class="card-link btn btn-success" onclick="editar_proveedor('${ item.id }', '${item.nombre}', '${item.description}', '${item.contacto}', '${item.correo}', '${item.empresa}', '${item.imagen}')">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                          </svg>
                        </a>
                        <a class="card-link btn btn-danger" onclick="eliminar_pr('${item.id}')">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg>
                        </a>
                        </div>
                  </div>
                </div>`);
                }
            });
        }
    });
}
//Abre el modal para editar usuario *
function editar_usuario(id, nombre, apellido, nick, correo, estado){
    $("#enombre").val(nombre);
    $("#eapellido").val(apellido);
    $("#enick").val(nick);
    $("#ecorreo").val(correo);
    $("#ecargo").val(estado);
    $("#eid").val(id);
    $("#modal2").modal('show');
}
// Abre el modal para eliminar usuario *
function eliminar(id){
    $('#elid').val(id);
    $("#modal3").modal('show');
}
// Es para crear un nuevo usuario*
function guardar_usuario(){
    $('#form2').submit((event)=>{
        event.preventDefault();
    });
    $.ajax({
        url: `../backend/cruduser.php?cnombre=${$("#nombre").val()}&apellido=${$("#apellido").val()}&nick=${$("#nick").val()}&correo=${$("#correo").val()}&clave=${$("#clave").val()}&estado=${$("#cargo").val()}`,
        method: 'get',
        dataType: 'json',
        success: (res)=>{
            $.each(res, (index, item)=>{
                if(item.mensaje == 'uc'){
                    $('#lista_user').empty();
                    $("#modalnuevo").modal('hide')
                    obtener_usuarios();
                }else{
                    alert(`Error al crear el usuario`);
                }
            });
        }
    });
}
// Sirva para eliminar usuario *
function eliminar_usuario(){
    $('#form4').submit((event)=>{
        event.preventDefault();
    });
    $.ajax({
        url: `../backend/cruduser.php?elid=${ $("#elid").val() }`,
        method: 'get',
        dataType: 'json',
        success: (res)=>{
            $.each(res, (index, item)=>{
                if(item.mensaje == 'eli'){
                    $('#lista_user').empty();
                    $("#modal3").modal('hide');
                    obtener_usuarios();
                }else{
                    alert("Error al eliminar al usuario");
                }
            });
        }
    });
}
// Es para editar informacion de un usuario *
function modificar_datos(){
    $.ajax({
        url: `../backend/cruduser.php?eid=${$("#eid").val()}&nombre=${$("#enombre").val()}&apellido=${$("#eapellido").val()}&nick=${$("#enick").val()}&correo=${$("#ecorreo").val()}&clave=${$("#eclave").val()}&estado=${$("#ecargo").val()}`,
        type: 'get',
        dataType: 'json',
        success: (resp)=> {
            $.each(resp, (index, item)=>{
                if(item.mensaje == 'ued'){
                    $('#lista_user').empty();
                    $("#modal2").modal('hide');
                    obtener_usuarios();
                }else{
                    alert(`Error al eliminar el usuario`);
                }
            });
        }
    });
}
//Abre el modal para editar proveedor 
function editar_proveedor(id, nombre, description, contacto, correo, empresa, imagen){
    $("#enombre_pro").val(nombre);
    $("#edescripcion").val(description);
    $("#econtacto_prov").val(contacto);
    $("#ecorreo_prov").val(correo);
    $("#eempresa_prov").val(empresa);
    $("#eimagen_vieja").val(imagen);
    $("#eid_pro").val(id);
    $("#modalproved").modal('show');
}

// Abre el modal para eliminar proveedor 
function eliminar_pr(ids){
    $('#elpr').val(ids);
    $("#modalprovel").modal('show');
}


// Es para crear un nuevo proveedor
function guardar_proveedor(){
    // var parametros = .serialize();
    $("#cprovid").submit();
    // $.ajax({
        //     data: parametros,
        //     url: `../backend/crudprov.php?cpro`,
        //     method: 'post',
        //     dataType: 'json',
        //     success: (res)=>{
    //         $.each(res, (index, item)=>{
    //             if(item.mensaje == 'uc'){
        //                 $('#listprov').empty();
    //                 $("#modalprovcre").modal('hide')
    //                 obtener_usuarios();
    //             }else{
        //                 alert(`Error al crear el usuario`);
    //             }
    //         });
    //     }
    // });
}
// Sirva para eliminar proveedor 
function eliminar_proveedor(){
    $.ajax({
        url: `../backend/crudprov.php?elid=${ $("#elpr").val() }`,
        method: 'get',
        dataType: 'json',
        success: (res)=>{
            $.each(res, (index, item)=>{
                if(item.mensaje == 'eli'){
                    $('#listprov').empty();
                    $("#provel").modal('hide');
                    obtener_proveedores();
                }else{
                    alert("Error al eliminar al usuario");
                }
            });
        }
    });
}
// Es para editar informacion de un proveedor 
function modificar_datos_proveedor(){
    $("#fomi").submit();
    // var parametros = $("#fomi").serialize();
    // $.ajax({
        //     data: parametros,
        //     url: `../backend/crudprov.php?edprov`,
        //     type: 'post',
        //     dataType: 'json',
        //     success: (resp)=> {
            //         $.each(resp, (index, item)=>{
                //             if(item.mensaje == 'ped'){
                    //                 $('#listprov').empty();
    //                 $("#modalproved").modal('hide');
    //                 obtener_proveedores();
    //             }else{
        //                 alert(`Error al eliminar el usuario`);
        //             }
        //         });
        //     }
        // });
    }
// Es para editar informacion de un usuario *
function generar_reporte(){
    $.ajax({
        url: `../backend/genreport.php?reporte&inicio=${$('#fecha_ini').val()}&fin=${$('#fecha_fin').val()}`,
        type: 'get',
        dataType: 'json',
        success: (resp)=> {
            $('#showreport').removeAttr("src");
            $('#downloadbt').removeAttr("href");
            $.each(resp, (index, item)=>{
                if(item.mensaje == 'ss'){
                    $('#showreport').attr("src", "../src/documents/"+item.nombre+".png");
                    $('#downloadbt').removeClass('disabled');
                    $('#downloadbt').attr("href", "../src/documents/pdfs/"+item.nombre+".pdf");
                }else{
                    alert(`Error al generar el reporte`);
                }
            });
        }
    });
}