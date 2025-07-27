
function validarRutEnBD(rut)
{
  return $.ajax({
    url:"funciones/validar_rut.php",
    data: {"rut":rut},
    type: "POST",
    async: false
  }).responseText;  
}