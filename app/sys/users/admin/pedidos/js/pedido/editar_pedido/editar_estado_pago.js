

//editar proveedor del pedido

function editarEstadoPago(id_pedido, e_pago)
{
    let datos = {
        "id_pedido": id_pedido,
        "estado_pago": e_pago
    }
    return $.ajax({
        url: "funciones/pedido/editar/editar_estado_pago_pedido.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}


//estado del pago
let e_pago = "N";
$("#swEstadoPagoRegistrar").on("click", function(e)
{
    if(e.target.checked)
    {
        e_pago = "C";
    }
    else
    {
        e_pago = "A";
    }
    let id_pedido = $("#idPedido").text();
    let estado_pago = editarEstadoPago(id_pedido, e_pago);
    imprimirMontoTotalPedido();
    $('#pedidos').DataTable().ajax.reload();
})


//editar estado del pago desde el modal editar
$("#swEstadoPago").on("click", function(e)
{
    if(e.target.checked)
    {
        e_pago = "C";
    }
    else
    {
        e_pago = "A";
    }
    let id_pedido = $("#idModal").text();
    let estado_pago = editarEstadoPago(id_pedido, e_pago);
    console.log(estado_pago);
    imprimirMontoTotalPedido();
    $('#pedidos').DataTable().ajax.reload();
})
