
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
    let valorPedido = obtenerValorPedido(id);
    let iva = valorPedido*0.19;
    let iva_formateado = formatearNumero("P", iva);
    let valor_sin_iva = parseInt(valorPedido) - parseInt(iva);
    let valor_sin_iva_formateado = formatearNumero("P", valor_sin_iva);
    $("#valorPedidoFormateado").html(valor_sin_iva_formateado);
    $("#valorIvaFormateado").html(iva_formateado)
    let valor_pedido_formateado = formatearNumero("P", valorPedido);
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