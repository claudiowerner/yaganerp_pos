async function obtenerIDVenta(boton)
{
	let id = $(boton).attr("id");
	let cant = $(boton).attr("cant");
	let id_prod = $(boton).attr("id_prod");
	let pesaje = $(boton).attr("pesaje");

	
	if(pesaje.match("S"))
	{
		$("#cambiarCantidadPesaje").modal("show");
		
		$("#idVentaPesaje").html(id);
		$("#cantProdModPesaje").html(cant);
		$("#id_prodPesaje").html(id_prod);
	}
	if(pesaje.match("N"))
	{
		$("#cambiarCantidad").modal("show");

		//
		$("#idVenta").html(id);
		$("#cantProdMod").html(cant);
		$("#id_prod").html(id_prod);
	}
  
}