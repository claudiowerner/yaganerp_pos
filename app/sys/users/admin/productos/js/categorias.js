/*----------------------------------- DESCARGAR CATEGORÍAS AJAX --------------------------------------*/

function descargarCategorias()
{
    return $.ajax({

        url:"funciones/read_categorias.php",
        type: "POST",
        async: false
    }).responseText;
}


/* --------------------------------------------- FUNCIONES DOM ------------------------------------- */

function cargarCategoria()
{
    let respuesta = descargarCategorias()
    let json = JSON.parse(respuesta);
      let template = '<option value="O">---SELECCIONE---</option>';
      json.forEach(cat=>{
        template+=`<option value="${cat.id}">${cat.nombre_cat}</option>`;
      });
      $("#listCat").html(template);
      $("#listCatEditar").html(template);
  
}

cargarCategoria();
