

estadoClave = "";
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