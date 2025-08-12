function abrirVenta(id)
{
    //obtener ID de la caja asociada al ID de la venta
    let resp = $.ajax({
        url: "script_php/obtener_id_caja.php",
        data: {"id_venta": id},
        type: "POST",
        async: false
    }).responseText;

    let j = JSON.parse(resp);

    location.href = `detalle_cuenta/index.php?id_venta=${id}&id_caja=${j.caja}`;
}