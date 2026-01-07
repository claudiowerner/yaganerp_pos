/*----------------------------------- DESCARGAR CATEGORÍAS AJAX --------------------------------------*/

function obtener_numero_productos()
{
	$.ajax({
        url:"productos/funciones/leer/contar_productos_activos.php",
        type: "POST",
		success: function(e)
		{
			let j = JSON.parse(e)
			$("#num_prod_activos").html(j.prod_activos);
		}
    })
	.fail(function(e){
		console.error(e);
	})
}