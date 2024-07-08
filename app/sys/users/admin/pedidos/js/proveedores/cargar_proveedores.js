//cargar proveedores
function descargarProveedores()
{
  return $.ajax({
    url:"funciones/pedido/read/proveedores/read_proveedores.php",
    type: "POST",
    async: false
  }).responseText;
}


//rellenar proveedores para registrar nuevo pedido
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

  $("#slctProveedor").select2();
}

//rellenar proveedores para editar un pedido
function imprimirProveedoresEditar()
{
  let descarga = descargarProveedores();
  let json = JSON.parse(descarga);
  let template = "";
  json.forEach(j=>
  {
    template += `<option value='${j.id}'>${j.nombre_proveedor}</option>`;
  })

  $("#slctProveedorEditar").html(template);

  $("#slctProveedorEditar").select2();
}