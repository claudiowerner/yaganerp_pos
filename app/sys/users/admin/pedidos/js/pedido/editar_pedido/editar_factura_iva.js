

//editar proveedor del pedido

function editarFacturaConIva(e_fac)
{
    let id_pedido = $("#idPedido").text();
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
    editarFacturaConIva(e_fac);
})
