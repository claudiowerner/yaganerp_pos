function eliminarTemporada(id, nombre)
{

    swal({
        title: "¿Seguro?",
        text: 
        `¿Desea eliminar la temporada '${nombre}'?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((eliminar) => {
        if (eliminar)
        {
            $.ajax({
                url: "script_php/eliminar/eliminar_temporada.php",
                data: {"id": id},
                type: "POST",
                success: function(e)
                {
                    let j = JSON.parse(e);
                    if(j.eliminar)
                    {
                        $('#temporadas').DataTable().ajax.reload();
                    }
                    msjes_swal(j.titulo, j.mensaje, j.icono);
                }
            })    
        }
    })
}