function imprimirMontoTotalPedido()
{
	$.ajax({
		url:"funciones/pedido/read/pedido/read_monto_pedido.php",
		type: "POST",
		success: function(e)
		{
			let resultado = formatearNumero("P",e);
			$("#montoPedido").html(resultado);
		}
	});
	
}


imprimirMontoTotalPedido();