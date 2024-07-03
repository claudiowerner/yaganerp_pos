//cargar proveedores
function descargarProveedores()
{
  return $.ajax({
    url:"funciones/pedido/read/read_proveedores.php",
    type: "POST",
    async: false
  }).responseText;
}

function imprimirProveedores()
{
  let descarga = descargarProveedores();
  let json = JSON.parse(descarga);
  let template = "";
  json.forEach(j=>
  {
    template += `<option value='${j.id}'>${j.nombre_proveedor}</option>`;
  })
  $("#slctProveedor").html(template);
  $("#slctProveedorEditar").html(template);

  $("#slctProveedor").select2();
}