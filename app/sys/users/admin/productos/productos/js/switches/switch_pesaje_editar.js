rpEditar = "N"; //almacena el estado de que si el producto a editar requiere pesaje o no
$("#swPesajeEditar").on("click", function(e)
{
	enabled = true;
	if(e.target.checked)
	{
		rpEditar = "S";
		enabled = true;
		$("#pesajeEditar").show();
		$("#codBarraEditar").attr("required", true);
		$("#codBarraEditar").attr("placeholder", "");
	}
	else
	{
		rpEditar = "N";
		enabled = false;
		$("#pesajeEditar").hide();
		$("#codBarraEditar").attr("required", false);
		$("#codBarraEditar").attr("placeholder", "");
	}
})
