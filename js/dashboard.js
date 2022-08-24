$(document).ready(function(){
    
    obtener_comida(5000);

    //Charts
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: 'Periodo de consumo',
                data: [5, 4, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    $('#registro_fecha').on('click', registrar_fecha);
    $('#BtnAgua').on('click', cambiar_estado_agua);
    
    $('button').click( function(e) {
        $('.collapse').collapse('hide');
    });

});

function obtener_comida(tiempo){
    setInterval(()=>{
        $.ajax({
            url: '../backend/apialimento.php?micro',
            method: 'get',
            dataType: 'json',
            success: (res)=>{
                $.each(res, (index, item)=>{
                    console.log(item.llenura);
                    $("#GaugeMeter_1").gaugeMeter({percent:item.llenura});
                });
            }
        });
    }, tiempo);
}

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
