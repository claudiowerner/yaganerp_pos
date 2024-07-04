
$("#btnAgregarProducto").on("click", function(e)
{
    accionAgregarProducto();
})
$("#btnAgregarProducto2").on("click", function(e)
{
    accionAgregarProducto();
});


$("#btnAgregarProductoEditar").on("click", function(e)
{
    accionAgregarProductoEditar();
});
$("#btnAgregarProductoEditar2").on("click", function(e)
{
    accionAgregarProductoEditar();
});


function accionAgregarProducto()
{
    let id_pedido = $("#idPedido").text();
    let fecha_reg = getFecha();
    let agregar = agregarDetallePedido(id_pedido, fecha_reg);
    let respuesta = imprimirDetallePedido(id_pedido);
    $("#bodyPedidos").html(respuesta);
}


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