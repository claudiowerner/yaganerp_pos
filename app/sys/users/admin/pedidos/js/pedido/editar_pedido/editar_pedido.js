//conexión BD para edición de nombre de pedido
function conexionBDEdicion(datos)
{
    return $.ajax({
        url: "funciones/pedido/editar/editar_nombre_pedido.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}



//editar el nombre del pedido
function editarNombrePedido()
{
    let nombre = $("#txtNombrePedido").val();
    let id_pedido = $("#idPedido").text();

    let datos = {
        "nombre_pedido": nombre,
        "id_pedido": id_pedido
    }

    $("#nombrePedido").html(nombre);
    return conexionBDEdicion(datos);
}
//editar el nombre del pedido desde el modal EDITAR
function editarNombrePedidoEditar()
{
    let nombre = $("#txtNombrePedidoEditar").val();
    let id_pedido = $("#idModal").text();

    let datos = {
        "nombre_pedido": nombre,
        "id_pedido": id_pedido
    }

    $("#nombrePedido").html(nombre);
    return conexionBDEdicion(datos);
}

//editar nombre del producto en el detalle del pedido
function editarNombre(id)
{
    let nombre = $("#producto"+id).val();
    let datos = {
        "nombre":nombre,
        "id":id
    }
    $.ajax({
        url:"funciones/pedido/editar/editar_nombre_detalle_pedido.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;

}

//editar cantidad
function editarCantidad(id)
{
    let cantidad = $("#cantidad"+id).val();
    let datos = {
        "cantidad":cantidad,
        "id":id
    }
    let res = $.ajax({
        url:"funciones/pedido/editar/editar_cantidad_detalle_pedido.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}
//editar valor
function editarValor(id)
{
    let valor = $("#valor"+id).val();
    let datos = {
        "valor":valor,
        "id":id
    }
    $.ajax({
        url:"funciones/pedido/editar/editar_valor_detalle_pedido.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}
//Funcion que elimina el detalle de un pedido en la BD
function accionEliminarDetallePedidoBD(id)
{
    return $.ajax({
        url:"funciones/pedido/editar/eliminar_detalle_pedido.php",
        data: {"id":id},
        type: "POST",
        async: false
    }).responseText;
}
/*funcion que elimina un detalle específico de un pedido.*/
function eliminarDetallePedido(id)
{
    let response = accionEliminarDetallePedidoBD(id)

    if(response==1)
    {
        idPedido = $("#idPedido").text();
        let template = imprimirDetallePedido(idPedido);
        $("#bodyPedidos").html(template);
    }
}
/*funcion que elimina un detalle específico de un pedido en el modal de editar.*/
function eliminarDetallePedidoEditar(id)
{
    let response = accionEliminarDetallePedidoBD(id)

    if(response==1)
    {
        idPedido = $("#idModal").text();
        let template = imprimirDetallePedidoEditar(idPedido);
        $("#bodyPedidosEditar").html(template);
    }
}

/*funcion que elimina un detalle específico de un pedido cuando se está registrando.*/
function eliminarDetallePedido(id)
{
    let response = accionEliminarDetallePedidoBD(id);

    if(response==1)
    {
        let idPedido = $("#idPedido").text();
        let template = imprimirDetallePedido(idPedido);
        $("#bodyPedidos").html(template);
    }
}
/*funcion que elimina un detalle específico de un pedido cuando se está editando.*/
function eliminarDetallePedidoEditar(id)
{
    let response = accionEliminarDetallePedidoBD(id);

    if(response==1)
    {
        idPedido = $("#idModal").text();
        let template = imprimirDetallePedidoEditar(idPedido);
        $("#bodyPedidosEditar").html(template);
        let num_productos = obtenerNumeroProductos(idPedido);
        $("#prodSolic").html(num_productos);
    }
}