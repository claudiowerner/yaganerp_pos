
/* ------------------------------------------ FUNCION AJAX ------------------------------------------- */
function enviarCorreoRegistro(datosCorreo)
{
    return $.ajax({
        url: "php/cliente/correo/correo_registro.php",
        data: datosCorreo,
        type: "POST",
        async: true
    }).responseText;
}