
//editar proveedor del pedido

function editarEstadoPedido(id_pedido, e_pedido)
{
    let datos = {
        "id_pedido": id_pedido,
        "estado": e_pedido
    }
    return $.ajax({
        url: "funciones/pedido/editar/editar_estado_pedido.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}


//estado del pago
let e_pedido = "N";
$("#swEstadoPagoRegistrar").on("click", function(e)
{
    if(e.target.checked)
    {
        e_pedido = "C";
    }
    else
    {
        e_pedido = "A";
    }
    let id_pedido = $("#idPedido").text();
    let estado_pago = editarEstadoPago(id_pedido, e_pedido);
})


//editar estado del pago desde el modal editar
$("#swEstadoPedido").on("click", function(e)
{
    if(e.target.checked)
    {
        e_pedido = "C";
    }
    else
    {
        e_pedido = "A";
    }
    let id_pedido = $("#idModal").text();
    let estado = editarEstadoPedido(id_pedido, e_pedido);
})
