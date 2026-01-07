function imprimirMontoTotalPedido(id_temp)
{
	$.ajax({
		url:"funciones/pedido/read/pedido/read_monto_pedido.php",
		data: {"id_temp": id_temp},
		type: "POST",
		success: function(e)
		{
			console.log(e);
			let resultado = formatearNumero("P",e);
			$("#montoPedido").html(resultado);
		}
	});
	
}