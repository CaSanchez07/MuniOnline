<?php
    $color='#007b95'
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="icon" href="ruta/a/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="consultaExpediente.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="consultaExpediente.js" defer></script>
    <title>Municipio Online</title>
    <script> var color='<?php echo $color?>'; </script>
</head>
<body>
    <section>
        <h3>Consulta Expediente</h3>
        <form id='form_consulta' name='form_consulta' action='expediente_controller.php' method='post'>
            <div class="header-container">
                <div class="header-control">
                    <label for='numero'><b>Nº</b></label>
                    <input type='number' id='numero' name='numero' placeholder='123456789'> 
                </div>
                <div class="header-control">
                    <label for='letra' ><b>Letra</b></label>
                    <input type='text' id='letra' name='letra' placeholder='A' maxlength="1"> 
                </div>
                <div class=header-control>
                    <label for='anio' ><b>Año</b></label>
                    <input type='number' id='anio' name='anio' value='2024' maxlength="4"> 
                </div>
                <button type="button" id="btn-consultar" onclick="validarDatos()">Consultar</button>
            </div>
        </form>
        <div id="timeline">
            <div id="result"></div>
        </div>
        <div id="popup" class="popup">
            <p id="popupMensaje"></p>
            <button id="cerrarPopup">Cerrar</button>
        </div>
    </section>
</body>
</html>