$("#btnConfirmarPaga").on('click', function(e)
{
	swal({
		title: "¿Está seguro?",
		text: "¿Desea registrar el pago completo?",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((pagar) => {
		if (pagar)
		{
			let id = $("#id_venta").text();
			let formaPago = $("#metodoPagoGral").val();
			confirmarPaga("ticket.php",id, formaPago);
			cargarCorrelativo();
			cargarVentasCaja(descProd);
			llenarSelectProducto();
		} 
		else 
		{
			swal("Operación cancelada");
		}
	});
});  
