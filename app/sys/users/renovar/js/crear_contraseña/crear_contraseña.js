
$(document).on('submit','#Frm',function(event){

	"use strict";
	event.preventDefault();
	let user = $("#t_user").val();
	
	
	
	//Solicitud AJAX que busca el correo y el ID del cliente asociado al usuario que desea cambiar contraseña
	let respuesta = buscar_datos_usuario(user);

	//Conversion de la respuesta a JSON
	let json = JSON.parse(respuesta);
	console.log(json)


	//Registro de la solicitud en la BD
	$.ajax({
		url: "php/seguridad/crear/crear_solicitud.php",
		data: json,
		type: "POST",
		beforeSend: function(e)
		{
			$(".botonlg").html("Enviando solicitud...");
			$(".botonlg").prop("disabled", true);	
		},
		success: function(e)
		{
			let j = JSON.parse(e);
			$("#mensaje").html(j.mensaje+"<br><div id='loading-spinner' class='spinner'></div>")
			if(j.correo)
			{
				$("#cuerpo1").hide();
				$("#cuerpo2").show();
				
				let autorizacion;
				let js;

				//consultar cada 1 segundo si existe algún cambio en la solicitud de la autorización
				var solicitud = setInterval(function()
				{
					autorizacion = consultar_estado_solicitud(j.id_solicitud);
					js = JSON.parse(autorizacion);
					
					if(js.aut == "S") 
					{
						clearInterval(solicitud);
						cambiar_contraseña();
					}
					if(js.aut == "N")
					{
						$("#declinado").show();
						$("#mensaje").hide();
						clearInterval(solicitud);
					}
				}, 1000); 
			}
			else
			{
				alert(j.mensaje);
			}
		}
	}).fail(function(e){
		alert(e.responseText)
	})
});


$("#btnLogin").on("click", function(e)
{
	location.href = "../../";
})