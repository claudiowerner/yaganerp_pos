/*-------------------------------------- EDITAR CATEGORIA EN BD --------------------------------------- */
function editarCategoria(nombre, id)
{
  let datos = {
    "nombre": nombre,
    "id": id
  }
  return $.ajax({
    url: "php/editar_categoria_exe.php",
    data: datos,
    type: "POST",
    async: false
  }).responseText;
}

/*------------------------------------------ ACCIONES DOM --------------------------------------------- */


$("#categoria").on('click', 'tr', function(e)
{
  var cat = $('#categoria').DataTable();
  var datos = cat.row(this).data();
  $("#nomCatEditar").val(datos.nombre_cat);
  $("#idModal").html(datos.id);
});


$("#btnGuardarCambios").on('click', function(resp)
{
  var nombreCat = $("#nomCatEditar").val();
  var id = $("#idModal").text();

  if(nombreCat=="")
  {
    msjes_swal("Aviso", "Debe rellenar el campo 'Nombre'", "warning");
  }
  else
  {
    let registro_repetido = validarRegistroRepetido(nombreCat);
    if(registro_repetido==0)
    {
      let editar = editarCategoria(nombreCat, id);
      let json = JSON.parse(editar);
  
      msjes_swal(json.titulo, json.mensaje, json.icono);
      
      if(json.edicion)
      {
        $("#modalEditar").modal("hide");
        $('#categoria').DataTable().ajax.reload();
      }
    }
    else
    {
      msjes_swal("Aviso", "La categoría '"+nombreCat+"' ya existe.", "warning");
    }
  }
});



