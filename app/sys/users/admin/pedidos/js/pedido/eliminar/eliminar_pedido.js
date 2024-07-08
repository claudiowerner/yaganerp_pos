function eliminarPedidoBD(id)
{
    return $.ajax({
        url: "funciones/pedido/eliminar/eliminar_pedido.php",
        data: {"id_pedido": id},
        type: "POST",
        async: false
    }).responseText;
}


function eliminarPedido(id)
{
    swal({
        title: "¿Seguro?",
        text: `¿Desea eliminar el pedido ${id}?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((eliminar) => {
        if (eliminar)
        {
            let eliminarPedido = eliminarPedidoBD(id);
            let j = JSON.parse(eliminarPedido);

            msjes_swal(j.titulo, j.mensaje, j.icono);
            $('#pedidos').DataTable().ajax.reload();
            imprimirMontoTotalPedido()
        } 
        else 
        {
            swal("Operación cancelada");
        }
    });
}