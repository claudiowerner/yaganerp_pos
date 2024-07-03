//obtener ID del proveedor
function obtenerIDProveedor(id)
{
    return $.ajax({
        url:"funciones/pedido/read/read_id_proveedor.php",
        data: {"id_pedido": id},
        type: "POST",
        async: false
      }).responseText;
}





//accion al abrir modal de editar
function abrirModalEditar(id)
{
    imprimirProveedoresEditar();
    let idProveedor = obtenerIDProveedor(id);
    $("#slctProveedorEditar").select(idProveedor);

    //cargar detalles del pedido
    let respuesta = imprimirDetallePedidoEditar(id);
    $("#bodyPedidosEditar").html(respuesta);

    //abrir modal
    $("#modalEditar").modal("show");

    
    $("#idModal").html(id);
    let num_productos = obtenerNumeroProductos(id);
    $("#prodSolic").html(num_productos);

    cargarEstadoPedido(id);
    cargarEstadoPagoPedido(id);
    cargarFacturaConIva(id);
    calcular_valor(id);
}
