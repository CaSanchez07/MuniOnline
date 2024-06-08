function validarDatos() {
    const nroExpediente = document.getElementById('numero').value;
    const letter = document.getElementById('letra').value;
    const anio = document.getElementById('anio').value;
    const muni =1; 

    if (!nroExpediente || !letter || !anio) {
        $notificationwaer('Por favor, complete todos los campos.');
        return;
    }

    $.ajax({
        url: "expediente_controller.php",
        dataType:"json",
        type:"POST",
        data:{
            numero : nroExpediente,
            letra : letter,
            anio : anio,
            muni: muni
        },
        success: function(data) {
            console.log(data);
            if (data.length === 0) {
                mostrarPopup('Error: No hay registros para mostrar con los datos ingresados. Por favor ingrese nuevamente');
            }else{
                $('#btn-consultar').hide()
                let btnVolver=$('<button></button>').text('Consultar Otro').attr('id','volver');
                $('.header-conteiner').append(btnVolver);
                $('#timeline').css({
                    'background-color':'#ffffff',
                    'box-shadow':' 0 12px 12px 1px rgba(0, 0, 0, 0.1)'
                });
                data.forEach(function(item) {   

                    let nuevoDiv = $('<div></div>').addClass('ticket');
                    let circle = $('<div></di>').addClass('circle').css('background-color',color)
                    let p1 = $('<p></p>').text(item.sectoractual);
                    let p2 = $('<p></p>').text(item.estado);
                    let p3 = $('<p></p>').text(item.fechahora);

                    nuevoDiv.append(circle,p1, p2, p3);
                    $('#result').css('border-inline-start','1px solid'+color);
                    $('#result').append(nuevoDiv);
                    
                    
                });
            }
           $(document).on('click','#volver',function(event) {
                event.preventDefault();
                $('#volver').remove();
                $('#btn-consultar').show();
                $('#result').empty();
            });
            
        },
        error: function (response) {
            alert('Error inesperado, por favor vuelva a intentar');
        },
    });

function mostrarPopup(mensaje) {
    $('#popupMensaje').text(mensaje);
    $('body').addClass('back-popup')
    $('#popup').fadeIn();

}
    $('#cerrarPopup').click(function() {
        $('#popup').fadeOut();
        $('body').removeClass('back-popup');
    });
}