function validarSolicitudClave()
{
  let retornar = "";
  $.ajax({
    url: "php/leer/validar_solicitar_clave.php",
    type: "POST",
    async: false, 
    success: function(e)
    {
      retornar = e;
    }
  })
  return retornar;
}