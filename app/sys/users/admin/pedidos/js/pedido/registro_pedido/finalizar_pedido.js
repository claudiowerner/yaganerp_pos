
$("#btnFinalizarPedido").on("click", function(e)
{
    $('#pedidos').DataTable().ajax.reload();
    $("#modalRegistro").modal("hide");
    imprimirMontoTotalPedido();
})

//finalizar edición de pedido
$("#btnFinalizarPedidoEditar").on("click", function(e)
{
    $('#pedidos').DataTable().ajax.reload();
    $("#modalEditar").modal("hide");
    imprimirMontoTotalPedido();
})