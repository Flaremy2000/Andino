
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


});