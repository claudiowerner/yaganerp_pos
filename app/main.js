jQuery(document).on('submit','#Frm',function(event){
"use strict";
	event.preventDefault();

	$.ajax({
		url: 'login_exe.php',
		type: 'POST',
		dataType: 'json',
		data: $(this).serialize(),
		beforeSend: function(){
			$('.botonlg').val('Validando...');
		}
	})

	.done(function(respuesta){
		console.log("respuesta");
		if (!respuesta.error){
			if(respuesta.tipo === 1 )
			{
				location.href = 'users/admin/';
			}
			else if (respuesta.tipo === 2|| respuesta.tipo === 3)
			{
				location.href = 'users/atencion';
			}
		}else{
			$('.error').slideDown('slow');
			setTimeout(function(){
				$('.error').slideUp('slow');
			},3000);
			$('#Frm')[0].reset();
			$('.botonlg').val('Intente Nuevamente');
		}
	})
	.fail(function(resp){
		console.log(resp.responseText);
	})
	.always(function(){
		console.log("complete");
	});
});
