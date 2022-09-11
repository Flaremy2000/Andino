
if(window.sessionStorage){
    if(sessionStorage.getItem("id")){
        window.location.href = 'view/dashboard.php';
    }
}
$(document).ready(()=>{
        // sessionStorage.setItem("nombre", "Gonzalo");
      
        // var nombre = sessionStorage.getItem("nombre");

        // sessionStorage.removeItem("nombre");

    $('#Btnlogin').on('click',()=>{

        $('#loginFm').submit((event)=>{
            event.preventDefault();
        });

        if($('#floatingInput').val().length > 0 && $('#floatingPassword').val().length > 0){
                
            var correo = $('#floatingInput').val();
            var pass = $('#floatingPassword').val();
            $.ajax({
                url: '../backend/apiloguin.php?correo='+ correo.trim() + '&pass=' + pass.trim(),
                method: 'get',
                dataType: 'json',
                success: (res)=>{
                    $.each(res, (index, item)=>{
                        if(item.mensaje == 'usE'){
                            alert("Debe usar un correo existente en el sistema");
                        }else if(item.mensaje == 'passE'){
                            alert("Revise su contraseña y vuelva a intentar");
                        }else{
                            if(window.sessionStorage){
                                sessionStorage.setItem("id", item.id);
                                sessionStorage.setItem("nombre", item.nombre);
                                sessionStorage.setItem("apellido", item.apellido);
                                sessionStorage.setItem("nick", item.nick);
                                sessionStorage.setItem("correo", item.correo);
                                sessionStorage.setItem("estado", item.estado);
                            }
                            window.location.href = 'view/dashboard.php';
                        }
                    });
                }
            });
        }else{
            alert('Debe llenar todos los campos');
        }

    });

    $('#obtenerpass').click((e)=>{
        e.preventDefault();
        $("#modalrec").modal('show');
    });

    $('#content_btn').append(`<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
    </svg>
    Enviar`);


});

function enviar_correo() {
    $('#content_btn').empty();
    $('#content_btn').addClass('loader');
    $.ajax({
        url: `../backend/recuperarpass.php?correo=${ $('#nick').val() }`,
        method: 'get',
        dataType: 'json',
        success: (res)=>{
            $.each(res, (index, item)=>{
                if(item.mensaje == 'cre'){
                    $('#content_btn').removeClass('loader');
                    $('#content_btn').append(`<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                    </svg>
                    Enviar`);
                    alert('Correo enviado correctamente');
                }else{
                    $('#content_btn').removeClass('loader');
                    $('#content_btn').append(`<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                    </svg>
                    Enviar`);
                    alert('Error al enviar correo');
                }
            });
        }
    });
}