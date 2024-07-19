/* ----------------------------------------------- FUNCIONES AJAX ------------------------------------- */
//LEER CONFIGURACIÓN DE LAS CLAVES

function leerEstadoClave()
{
  return $.ajax({
    url: "script_php/clave/read_config_clave.php",
    type: "POST",
    async: false
  }).responseText;
}


swEstadoClave();

$("#claveAutorizaciones").on("click", function(e)
{
  $("#crearClave").modal("show");
  let estadoClave = leerEstadoClave()
  $("#claveAut").val("");
  $("#repClaveAut").val("");
  if(estadoClave.match("S"))
    {
      $("#swEstadoClave").prop("checked", true);
      $("#claveAut").attr("disabled", false);
      $("#repClaveAut").attr("disabled", false);
    }
    else
    {
      $("#swEstadoClave").prop("checked", false);
      $("#claveAut").attr("disabled", true);
      $("#repClaveAut").attr("disabled", true);
    }

});


$("#swEstadoClave").on("click", function(e)
{
  swEstadoClave();
})



