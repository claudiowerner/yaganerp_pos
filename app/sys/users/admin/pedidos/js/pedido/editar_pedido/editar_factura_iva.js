

//editar proveedor del pedido

function editarFacturaConIva(id_pedido, e_fac)
{
    let datos = {
        "id_pedido": id_pedido,
        "estado_factura": e_fac
    }
    return $.ajax({
        url: "funciones/pedido/editar/editar_factura_iva.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}



let e_fac = "N";
$("#swFacturaConIvaRegistrar").on("click", function(e)
{
    if(e.target.checked)
    {
        e_fac = "S";
    }
    else
    {
        e_fac = "N";
    }
    let id_pedido = $("#idPedido").text();
    editarFacturaConIva(id_pedido, e_fac);
})



//editar estado del pago desde el modal editar
$("#swFacturaConIva").on("click", function(e)
{
    if(e.target.checked)
    {
        e_fac = "S";
    }
    else
    {
        e_fac = "N";
    }
    let id_pedido = $("#idModal").text();
    editarFacturaConIva(id_pedido, e_fac);
    calcular_valor(id_pedido);
})
