/*----------------------------------- DESCARGAR CATEGORÍAS AJAX --------------------------------------*/

function descargarCategorias()
{
    return $.ajax({

        url:"productos/funciones/leer/read_categorias.php",
        type: "POST",
        async: false
    }).responseText;
}


/* --------------------------------------------- FUNCIONES DOM ------------------------------------- */

function cargarCategoria(id)
{
    let respuesta = descargarCategorias()
    let json = JSON.parse(respuesta);
    let selected = "";
	let template = '<option value="0">---SELECCIONE---</option>';
	json.forEach(cat=>{
		if(cat.id==id)
		{
			selected = "selected";
		}
		template+=`<option value="${cat.id}" ${selected}>${cat.nombre_cat}</option>`;
	});
	$("#listCat").html(template);
	$("#listCatEditar").html(template);
	
}
