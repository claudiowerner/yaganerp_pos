function correo_error_conexion_db(mensaje)
{
    $.ajax({
        url: "php/registro_errores/correo/correo_db.php",
        data: {"mensaje": mensaje},
        type: "POST",
        success: function(e)
        {
            let j = JSON.parse(e);
            msjes_swal(j.titulo, j.mensaje, j.icono);
        }
    })
}