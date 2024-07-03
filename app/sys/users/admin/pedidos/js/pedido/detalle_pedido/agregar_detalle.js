
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
});


$("#btnAgregarProductoEditar").on("click", function(e)
{
    accionAgregarProductoEditar();
});
$("#btnAgregarProductoEditar2").on("click", function(e)
{
    accionAgregarProductoEditar();
});

function accionAgregarProductoEditar()
{
    let id_pedido = $("#idModal").text();
    let fecha_reg = getFecha();
    let detalle = agregarDetallePedido(id_pedido, fecha_reg);
    let respuesta = imprimirDetallePedido(id_pedido)
    $("#bodyPedidosEditar").html(respuesta);
    let num_productos = obtenerNumeroProductos(id_pedido);
    $("#prodSolic").html(num_productos);
    calcular_valor(id_pedido);
}