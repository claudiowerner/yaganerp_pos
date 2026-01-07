$("#btnAbrirCaja").on('click', function(e)
{
	let nomCaja = $("#nombreCaja").val();
	
	if(nomCaja=="")
	{
		$("#msjCaja").html("<span style='color: red'>Debe rellenar el campo</span>");
	}
	else
	{
		$.ajax({
			url:"php/crear/abrir_caja.php",
			data: {"nomCaja": nomCaja},
			type: "POST",
			success: function(e)
			{
				msjes_swal("Excelente", e, "success");
				$('#cierreCaja').DataTable().ajax.reload();
				$("#abrirCaja").modal("hide");
				$("#msjCaja").html("<span style='color: red'></span>");
			}
		})
		.fail(function(e){
			alert(e.responseText)
		})
	}
})