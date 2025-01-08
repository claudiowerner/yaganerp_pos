//cargar estado de trabajo con o sin stock (activado o desactivado)
$.ajax({
	url:"productos/funciones/leer/read_config_productos.php",
	type: "POST",
	success: function(e)
	{
		if(e.match("S"))
		{
			$("#cantidadProd").attr("disabled", false);
			$("#txtCantidadEditar").attr("disabled", false);
		}
		else
		{
			$("#cantidadProd").attr("disabled", true);
			$("#txtCantidadEditar").attr("disabled", true);
			$("#cantidadProd").val("Stock desactivado");
		}
	}
})