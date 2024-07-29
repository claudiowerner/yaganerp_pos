/* --------------------------------------------- FUNCIONES AJAX --------------------------------------- */
function descargarResumenPedidos()
{
    return $.ajax({
        url: "funciones/pedido/read/pedido/read_resumen_pedidos.php",
        type: "POST",
        async: false
    }).responseText;
}

/* ---------------------------------------------- ACCIONES DOM ---------------------------------------- */
$("#btnResumenPedidos").on("click", function(e)
{
    $("#modalResumenPedidos").modal("show");
    let descarga = descargarResumenPedidos();
    try
    {
        let json = JSON.parse(descarga);
        let np = json.num_pedidos;//número de pedidos 
        let ph = json.pedidos_hechos;//pedidos hechos
        let pph = json.pedidos_por_hacer;//pedidos por hacer
        let pp = json.pedidos_pagados;//pedidos pagados
        let ppp = json.pedidos_por_pagar;

        let monto_total = parseInt(json.monto_pagado) + parseInt(json.monto_por_pagar);
        let mtf = formatearNumero("P", monto_total);//monto total formateado
        let mpf = formatearNumero("P", json.monto_pagado);//monto pagado formateado
        let mppf = formatearNumero("P", json.monto_por_pagar);//monto por pagar formateado
        $("#pedidosHechos").html(ph+"/"+np);
        $("#pedidosPorHacer").html(pph+"/"+np);
        $("#pedidosPagados").html(pp+"/"+np);
        $("#pedidosPorPagar").html(ppp+"/"+np);
        $("#montoPagado").html(mpf+"/"+mtf)
        $("#montoPorPagar").html(mppf+"/"+mtf)

    }
    catch(e)
    {
        console.error(e)
        msjes_swal("Aviso", e, "warning");
    }
})