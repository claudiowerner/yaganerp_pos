function expandirDatosTemporada(id, nombre)
{
	$("#nomTemporada").html("'"+nombre+"'");
	$("#modalDatosTemporada").modal("show");
	$.ajax({
		url: "script_php/leer/leer_datos_temporada.php",
		data: {"id": id},
		type: "POST",
		success: function(e)
		{
			let j = JSON.parse(e)

			let valor = formatearNumero("P", j.valor);
			let inversion = formatearNumero("P", j.inversion);
			$("#ventasTemporada").html(j.ventas_hechas);
			$("#montoTemporada").html(valor);
			$("#pedidosTemporada").html(j.pedidos_hechos);
			$("#inversionTemporada").html(inversion);
		}
	})
}