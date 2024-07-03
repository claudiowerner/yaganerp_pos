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

//funcion que elimina un detalle específico de un pedido
function eliminarDetallePedido(id, item)
{
    let response = $.ajax({
        url:"funciones/pedido/editar/eliminar_detalle_pedido.php",
        data: {"id":id},
        type: "POST",
        async: false
    }).responseText;

    if(response==1)
    {
        idPedido = $("#idPedido").text();
        let template = imprimirDetallePedido(idPedido);
        $("#bodyPedidos").html(template);
    }
}