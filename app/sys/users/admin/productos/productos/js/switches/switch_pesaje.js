rp = "N"; //almacena el estado de que si el producto requiere pesaje o no
$("#swPesaje").on("click", function(e)
{
	html = "";
	if(e.target.checked)
	{
		rp = "S";
		html = "Valor neto por KG.";
		$("#pesaje").show();
		$("#codigoBarra").attr("required", false);
		$("#codigoBarra").prop("disabled", true);
		$("#codigoBarra").attr("placeholder", "Campo no necesario");
	}
	else
	{
		rp = "N";
		html = "Valor neto";
		$("#pesaje").hide();
		$("#codigoBarra").attr("required", true);
		$("#codigoBarra").prop("disabled", false);
		$("#codigoBarra").attr("placeholder", "");
	}
	$("#lblValorNeto").html(html);
})
