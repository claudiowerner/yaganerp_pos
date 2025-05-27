
/* ------------------------------------------------ FUNCION AJAX ---------------------------------------------------- */
function eliminarClienteAjax(id)
{
    return $.ajax({
        url: "php/cliente/clientes/eliminar_cliente.php",
        data: {"id": id},
        type: "POST",
        async: false
    }).responseText;
}


/* ------------------------------------------------ FUNCION DOM ----------------------------------------------------- */
function eliminarCliente(id, nombre)
{
    swal({
        title: "¿Está seguro?",
        text: `¿Desea eliminar al cliente '${nombre}'?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((eliminar) => {
        if (eliminar)
        {
            let respuesta = eliminarClienteAjax(id);
            let j = JSON.parse(respuesta);
            msjes_swal(j.titulo, j.mensaje, j.icono)
            $('#producto').DataTable().ajax.reload();
        }
        else 
        {
            msjes_swal("Operación cancelada");
        }
    });
}