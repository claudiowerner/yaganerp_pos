/* ------------------------------------------------- FUNCION AJAX ----------------------------------------------------- */
function eliminarPromocionAjax(id)
{
    $.ajax({
        url: "promociones/funciones/eliminar/eliminar_promocion.php",
        data: {"id": id},
        type: "POST",
        success: function(e)
        {
            let j = JSON.parse(e);
            msjes_swal(j.titulo, j.mensaje, j.icono);
            $('#tablaPromociones').DataTable().ajax.reload();
        }
    })
    .fail(function(e){
        console.error("ERROR AL ELIMINAR PROMOCION: \n"+e.responseText)
    })
}

/* -------------------------------------------------- FUNCION DOM ----------------------------------------------------- */
function eliminarPromocion(id)
{
    swal({
        title: "¿Está seguro?",
        text: `¿Desea eliminar esta promoción?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((eliminar) => {
        if (eliminar)
        {
            eliminarPromocionAjax(id);
        }
        else 
        {
            msjes_swal("Operación cancelada");
        }
    });
}