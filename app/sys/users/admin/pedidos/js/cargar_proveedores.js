//cargar proveedores
$.ajax({
  url: "read_proveedores.php",
  type: "GET",
  success: function(e)
  {
    template ="";
    json = JSON.parse(e);
    json.forEach(j=>
      {
        template += 
        `<option value='${j.id}'>${j.nombre_proveedor}</option>`
        ;
      })
      $("#slctProveedor").html(template);
      $("#slctProveedorEditar").html(template);
  }
})
.fail(function(e)
{
  console.log(e.responseText)
})

$("#slctProveedor").select2();