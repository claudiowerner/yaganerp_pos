
$("#btnFinalizarPedido").on("click", function(e)
{
    let id_temp = $("#idTemporada").text();
    leer_pedidos(id_temp);
    $("#modalRegistro").modal("hide");
    imprimirMontoTotalPedido();
})

//finalizar edición de pedido
$("#btnFinalizarPedidoEditar").on("click", function(e)
{
    
    let id_temp = $("#idTemporada").text();
    leer_pedidos(id_temp);
    $("#modalEditar").modal("hide");
    imprimirMontoTotalPedido();
})