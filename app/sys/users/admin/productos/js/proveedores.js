/* ------------------------------------------- FUNCIONES AJAX ------------------------------------------ */
function descargarProveedoresAjax()
{
  return $.ajax({
    url: "funciones/read_proveedores.php",
    type: "POST",
    async: false
  }).responseText;
}



/* -------------------------------------------- FUNCIONES DOM ------------------------------------------ */


function cargarProveedores()
{
  let descargar = descargarProveedoresAjax();
  let template = "";
  let json = JSON.parse(descargar);
  json.forEach(j=>{
    template = template + `<option value='${j.id}'>${j.nombre_proveedor}</option>`;
  });
  return template
}