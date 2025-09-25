function modificarCant(id, cant, idProd)
{
	$.ajax({
		url:"func_php/venta/editar_venta_exe.php?id="+id+"&cant="+cant+"&idProd="+idProd,
		type: "GET",
		success: function(r)
		{	
			cargarVentasCaja();
		}
	})
	.fail( function(e) {
		console.error( 'Error modificar productos!!'+e.responseText );
	});
}