//obtener ID del proveedor
function obtenerIDProveedor(id)
{
    return $.ajax({
        url:"funciones/pedido/read/proveedores/read_id_proveedor.php",
        data: {"id_pedido": id},
        type: "POST",
        async: false
      }).responseText;
}





//accion al abrir modal de editar
function abrirModalEditar(id)
{
    //abrir modal
    $("#modalEditar").modal("show");

    
    imprimirProveedoresEditar();
    let idProveedor = obtenerIDProveedor(id);
    $("#slctProveedorEditar").select(idProveedor);

    //cargar detalles del pedido
    let respuesta = imprimirDetallePedidoEditar(id);
    $("#bodyPedidosEditar").html(respuesta);

    //imprimir nombre del pedido
    let nombrePedido = obtenerNombrePedido(id);
    $("#txtNombrePedidoEditar").val(nombrePedido)
    $("#nombrePedidoEditar").html(nombrePedido)

    
    $("#idModal").html(id);
    let num_productos = obtenerNumeroProductos(id);
    $("#prodSolic").html(num_productos);

    cargarEstadoPedido(id);
    cargarEstadoPagoPedido(id);
    cargarFacturaConIva(id);
    calcular_valor(id);
}
