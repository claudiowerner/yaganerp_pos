
/* ------------------------------------------- ACCIONES AJAX ----------------------------------------- */
function registrarClave(claveAut, estadoClave)
{
    return $.ajax({
        url: "script_php/clave/clave_aut.php",
        data: {"clave": claveAut, "estado": estadoClave},
        type: "POST",
        async: false
      }).responseText;
}
/* ------------------------------------------- ACCIONES DOM ------------------------------------------ */
$("#btnCrearClave").on('click', function(e)
{
  e.preventDefault();
  let claveAut = $("#claveAut").val();
  let repClaveAut = $("#repClaveAut").val();

  if(claveAut==''||repClaveAut=='')
  {
    if($("#swEstadoClave").prop("checked")==true)
    {
      msjes_swal("Aviso", "Debe rellenar todos los campos", "warning");
    }
  }
  if($("#swEstadoClave").prop("checked")||!$("#swEstadoClave").prop("checked"))
  {
    if(claveAut!=repClaveAut)
    {
        msjes_swal("Aviso", "Las contraseñas indicadas no coinciden", "warning");
    }
    else
    {
      let registrar = registrarClave(claveAut, estadoClave)
      let json = JSON.parse(registrar);

      msjes_swal(json.titulo, json.mensaje, json.icono);

      if(json.registro_clave||json.edicion_clave)
      {
        $("#crearClave").modal("hide");
      }
    }
  }
});
