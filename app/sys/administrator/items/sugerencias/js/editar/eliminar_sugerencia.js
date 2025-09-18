function eliminarSugerencia(id)
{
    swal({
        title: "¿Está seguro?",
        text: `¿Desea eliminar la sugerencia #${id}?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((eliminar) => {
        if (eliminar)
        {
            $.ajax({
                url: "php/sugerencias/editar/eliminar_sugerencia.php",
                data: {"id": id},
                type: "POST",
                success: function(e)
                {
                    let j = JSON.parse(e);
                    msjes_swal(j.titulo, j.mensaje, j.icono)
                    cantidad_sugerencias();
                    $("#tab_sugerencia").DataTable().ajax.reload();
                }
            })
        }
        else 
        {
            msjes_swal("Operación cancelada");
        }
    });
}