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

	.done(function(respuesta)
	{
		console.log(respuesta.mensaje);
		if (!respuesta.error)
		{
			if(respuesta.tipo === 1 )
			{
				location.href = 'users/admin/';
			}
			else if (respuesta.tipo === 2|| respuesta.tipo === 3)
			{
				location.href = 'users/atencion';
			}
		}
		if(respuesta.renovar==true)//se verifica si se tiene que renovar la contraseña
		{
			alert("Aviso: Debe renovar su contraseña, por lo que será redirigido a la sección 'Usuarios', para que pueda renovar su contraseña de administrador.");
			location.href = 'users/admin/usuarios/';
		}
		else
		{
			$("#error").html(respuesta.mensaje);
			$('.error').slideDown('slow');
			setTimeout(function(){
				$('.error').slideUp('slow');
			},5000);
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

function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patrón de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
