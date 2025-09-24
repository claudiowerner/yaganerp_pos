$("#btnActCantidad").on('click', function(e)
{
	let id = $("#idVenta").text();
	let idProd = $("#id_prod").text();
	let id_venta = $("#id_venta").text();
	let cant = parseInt($("#cantProdMod").text());
	let estadoStock = comprobarEstadoStockMinimo();
	let j_stock = JSON.parse(estadoStock);

	if(j_stock.activo)
	{
		//comprobar cantidad existente en la BD
		cantidadBD = parseInt(comprobarCantidad(idProd));
		if(cant==cantidadBD)
		{
			modificarCant(id, cant, idProd);
		}
		else
		{
			if(cant>=cantidadBD)
			{
				swal({
					title: "Aviso",
					text: "Cantidad insuficiente. No se modificó la venta.",
					icon: "warning"
				})
			}
			else
			{
				modificarCant(id, cant, idProd);
			}
		}
	}
	else
	{
		modificarCant(id, cant, idProd);
	}
	aplicar_promo_actualizar_cantidad()
})