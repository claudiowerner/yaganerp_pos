function enviarNuevaContraseña(id, nombre)
{
    swal({
        title: "¿Está seguro?",
        text: `¿Desea enviar una nueva contraseña a ${nombre}?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((cambioContraseña) => {
        if (cambioContraseña)
        {
            $("#passNueva"+id).prop("disabled", true)
            $("#creandoPassNueva"+id).toggleClass('fontello-paper-plane').toggleClass("fontello-arrows-cw");
            //conexion con servidor
            $.ajax({
                url: "php/cliente/correo/correo_cambio_contraseña.php",
                data: {"id":id},
                type: "POST",
                success: function(e)
                {
                    $("#passNueva"+id).prop("disabled", false)
                    $("#creandoPassNueva"+id).toggleClass("fontello-arrows-cw").toggleClass('fontello-paper-plane');
                    let json = JSON.parse(e);
                    msjes_swal(json.titulo, json.mensaje, json.icono);
                }
            })
            .fail(function(e)
            {
                console.log(e)
            })
        }
        else 
        {
            msjes_swal("Operación cancelada");
        }
    });
}