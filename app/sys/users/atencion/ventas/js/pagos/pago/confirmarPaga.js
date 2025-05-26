function confirmarPaga(ticket, id, formaPago)
{
	let nCaja = $("#nCaja").text();
	let totalVenta = $("#totalVenta").text();
	let fecha = getFechaBD();
	let hora = getHora();
	let idCaja = $("#id_caja").text();
	let nomCaja = $("#nomCaja").text();
	let descto = parseFloat($("#descuento").text()/100);

	let datos = {
		"id_venta":id,
		"nCaja": nCaja,
		"totalVenta": totalVenta,
		"fecha": fecha,
		"hora": hora,
		"idCaja": idCaja,
		"forma_pago": formaPago,
		"id_venta": id,
		"idCierre": idCaja,
		"nomCaja": nomCaja,
		"descto": descto
	}

	$.ajax({
		url: "func_php/pagos/pagar_venta_total.php",
		data: datos,
		type: "POST",
		success: function(e)
		{
			msjes_swal("Excelente", e, "success");
			$("#btnPagarVenta").prop("disabled", true);
			$("#btnAnularVenta").prop("disabled", true);
			$("#btnAñadirCuenta").prop("disabled", true);
			$("#btnCrearVenta").prop("disabled", false);
			id_usuario = "";
			
			
			imprimirBoleta(ticket, id);
			descontar_productos(id_venta);
			
			let rut = $("#spanRut").text();
		}
	});
}

