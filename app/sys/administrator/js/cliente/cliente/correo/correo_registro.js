
/* ------------------------------------------ FUNCION AJAX ------------------------------------------- */
function enviarCorreoRegistro(datosCorreo)
{
    return $.ajax({
        url: "php/cliente/correo/correo.php",
        data: datosCorreo,
        type: "POST",
        async: false
    }).responseText;
}