$(document).ready(()=>{


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
                dataType: 'text',
                success: (res)=>{
                    console.log(res);
                    if (res == "si"){
                        window.location.href = 'view/dashboard.php';
                    }else {
                        alert('El usuario o contraseña estan incorrectos o no existen :' + res);
                    }
                }
            });
        }else{
            alert('Debe llenar todos los campos');
        }

    });


});