function cerrarTemporada(id, nombre)
{
    swal({
        title: "¿Seguro?",
        text: 
        `¿Desea cerrar la temporada la temporada '${nombre}'?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((eliminar) => {
        if (eliminar)
        {
            $.ajax({
                url: "script_php/editar/cerrar_temporada.php",
                data: {"id": id},
                type: "POST",
                success: function(e)
                {
                    let j = JSON.parse(e);
                    msjes_swal(j.titulo, j.mensaje, j.icono);
                    if(j.cierre)
                    {
                        $('#temporadas').DataTable().ajax.reload();
                    }
                }
            })
        }
    })
}