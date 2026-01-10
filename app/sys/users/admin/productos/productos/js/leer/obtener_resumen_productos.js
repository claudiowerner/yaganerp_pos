/* -------------------------------------------------- FUNCION DOM ------------------------------------------------- */
$("#btnResumenProductos").click(function(e)
{
	$("#modalResumenProductos").modal("show");

	$.ajax({
        url:"productos/funciones/leer/resumen_productos_activos.php",
        type: "POST",
		success: function(e)
		{
			let js = JSON.parse(e);
			console.log(json)
			let template = "";
			js.forEach(j=>{
				template += `<tr><td><label>${j.nombre}</label></td><td>${j.cantidad}</td></tr>`;
			})
			$("#bodyResumenProductos").html(template);
		}
    })
	.fail(function(e){
		console.error(e);
	})
})