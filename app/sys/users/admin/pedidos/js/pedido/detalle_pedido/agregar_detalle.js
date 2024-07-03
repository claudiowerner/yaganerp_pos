
$("#btnAgregarProducto").on("click", function(e)
{
    id_pedido = $("#idPedido").text();
    fecha_reg = getFecha();
    agregarDetallePedido(id_pedido, fecha_reg);
    let respuesta = imprimirDetallePedido(id_pedido)
    $("#bodyPedidos").html(respuesta);
})
$("#btnAgregarProducto2").on("click", function(e)
{
    id_pedido = $("#idPedido").text();
    fecha_reg = getFecha();
    agregarDetallePedido(id_pedido, fecha_reg);
    let respuesta = imprimirDetallePedido(id_pedido)
    $("#bodyPedidos").html(respuesta);
})