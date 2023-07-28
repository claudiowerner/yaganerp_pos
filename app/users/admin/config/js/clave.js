//verificar si esta actiada la opción de la clave para marcar como seleccionado el checkbox 
// de habilitar la edición / creación de clave

$.ajax
({
  url: "clave/read_config_clave.php",
  type: "POST",
  async: false,
  success: function(e)
  {
    if(e.match("S"))
    {
      $("#swEstadoClave").prop("checked", true);
    }
    else
    {
      $("#swEstadoClave").prop("checked", false);
    }
  }
})

swEstadoClave();

estadoClave = "";
$("#swEstadoClave").on("click", function(e)
{
  swEstadoClave();
})



$("#btnCrearClave").on('click', function(e)
{
  e.preventDefault();
  let claveAut = $("#claveAut").val();
  let repClaveAut = $("#repClaveAut").val();

  if(claveAut==''||repClaveAut=='')
  {
    if($("#swEstadoClave").prop("checked")==true)
    {
      $("#msj").html("<span style='color: red'>Debe rellenar todos los campos</span>");
    }
  }
  if($("#swEstadoClave").prop("checked")||!$("#swEstadoClave").prop("checked"))
  {
    $("#msj").html("<span style='color: red'></span>");
    if(claveAut!=repClaveAut)
    {
      $("#msj").html("<span style='color: red'>Las claves ingresadas no coinciden</span>");
    }
    else
    {
      $.ajax({
        url: "clave/clave_aut.php",
        data: {"clave": claveAut, "estado": estadoClave},
        type: "POST",
        success: function(e)
        {
          msjes_swal("Excelente", e, "success");
          $("#crearClave").modal("hide");
        }
      })
    }
  }
});

function swEstadoClave()
{
  estado = $("#swEstadoClave").prop("checked");
  if(estado)
  {
    estadoClave = "S";
    $("#claveAut").attr("disabled", false);
    $("#repClaveAut").attr("disabled", false);
  }
  else
  {
    estadoClave = "N";
    $("#claveAut").attr("disabled", true);
    $("#repClaveAut").attr("disabled", true);
  }
}