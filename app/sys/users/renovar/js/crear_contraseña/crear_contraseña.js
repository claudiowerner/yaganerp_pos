
$(document).on('submit','#Frm',function(event){

"use strict";
	event.preventDefault();

	$.ajax({
		url: "php/crear_contraseña/crear_contraseña.php",
		type: 'POST',
		dataType: 'json',
		data: $(this).serialize(),
		beforeSend: function(){
			$('.botonlg').val('Validando...');
		}
	})

	.done(function(r)
	{
		if(r.cambio)
		{
			toastr.success(r.mensaje);
			//Redirigir a la pantalla de login
			setTimeout(function(){
				location.href  = "../../";
			}, 5000)
		}
		else
		{
			toastr.error(r.mensaje);
		}
	})
	.fail(function(resp){
		console.log(resp.responseText);
	})
	.always(function(){
		console.log("complete");
	});
});