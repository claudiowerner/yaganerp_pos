function cierreCaja(id)
{
  	let cajaAbierta = validarCajasDeVentaAbierta();
  	cajaAbierta = parseInt(cajaAbierta);
	
	if(cajaAbierta==0)
	{
		$.ajax(
		{
			url:"php/editar/cierre_caja.php",
			data: {"id": id},
			type: "POST",
			success: function(e)
			{
				if(e.match(/No se puede cerrar/))
				{
					msjes_swal("Aviso", e, "warning");
				}
				else
				{
					msjes_swal("Excelente", e, "success");
					//imprimirResumenVenta("../../",idCierre);
				}
				$('#cierreCaja').DataTable().ajax.reload();
			}
		})
		.fail(function(e)
		{
			msjes_swal("Error", e, "error");
		})
	}
	else
	{
		msjes_swal("Aviso", "Se deben cerrar todas las cajas de atención al cliente que estén abiertas", "warning");
	}
}