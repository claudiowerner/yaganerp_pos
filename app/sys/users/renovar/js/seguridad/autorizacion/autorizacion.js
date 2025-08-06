function consultar_estado_solicitud(id)
{
    return $.ajax({
        url: "php/seguridad/autorizacion/autorizacion.php",
        data: {"id": id},
        type: "POST",
        async: false
    }).responseText;
}