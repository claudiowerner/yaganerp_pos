
//Calculo de valor con iva
function valor_con_iva(id)
{
    let valorPedido = obtenerValorPedido(id);
    let valor_pedido_formateado = formatearNumero("P", valorPedido);
    $("#valorPedidoFormateado").html(valor_pedido_formateado);
    $("#valorIvaFormateado").html("$"+0);
    $("#totalPedidoFormateado").html(valor_pedido_formateado);
}

//Calculo de valor sin iva
function valor_sin_iva(id)
{
    debugger;
    let valorPedido = obtenerValorPedido(id);
    let iva = valorPedido*0.19;
    let valor_formateado = formatearNumero("P", valorPedido);
    let iva_formateado = formatearNumero("P", iva);
    let valor_con_iva =parseInt(valorPedido) +parseInt(iva);
    $("#valorPedidoFormateado").html(valor_formateado);
    $("#valorIvaFormateado").html(iva_formateado)
    let valor_pedido_formateado = formatearNumero("P", valor_con_iva);
    $("#totalPedidoFormateado").html(valor_pedido_formateado);
}


function calcular_valor(id)
{
    let factura_con_iva = cargarFacturaConIvaCalculo(id);
    
    if(factura_con_iva.match(/N/))
    {
        valor_con_iva(id);
    }
    else
    {
        valor_sin_iva(id);
    }
}