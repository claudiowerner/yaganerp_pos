$("#btnConfirmarDescto").on("click", function(e)
{
	swal({
		title: "¿Está seguro?",
		text: "¿Desea aplicar descuento?",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((pagar) => {
		if (pagar)
		{
			aplicarDescto();
			cargarDescto();
		} 
		else 
		{
			swal("Sin descuentos aplicados");
		}
	});
})

