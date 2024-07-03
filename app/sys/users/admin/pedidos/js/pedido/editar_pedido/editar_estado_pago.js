

//editar proveedor del pedido

function editarEstadoPago(e_pago)
{
    let id_pedido = $("#idPedido").text();
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
        e_pago = "S";
    }
    else
    {
        e_pago = "N";
    }
    let estado_pago = editarEstadoPago(e_pago);
})
