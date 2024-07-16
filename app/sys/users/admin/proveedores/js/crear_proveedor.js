function registrarProveedor(rut, nombre)
{
    let datos ={
        "rut": rut,
        "nombre": nombre,
        "fecha" : getFechaBD()
    }
    
    return $.ajax({
        url: "func_php/crear_proveedor.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}




$("#formRegistroProveedor").submit(function(e)
{
  e.preventDefault();
  let rut = $("#txtRutProveedor").val();
  let nombre = $("#txtNombreProveedor").val();


  let respuesta = registrarProveedor(rut, nombre);
  let json = JSON.parse(respuesta);
  msjes_swal(json.titulo, json.mensaje, json.icono);

  if(json.registro)
  {
    $("#producto").DataTable().ajax.reload();
    $("#formRegistroProveedor").trigger('reset');
    $("#modalRegistro").modal("hide");
  }

});