function cargarCajasPermitidas()
{
  $.ajax(
    {
      url: "script_php/read_cajas_permitidas.php",
      type: "POST",
      async: false,
      success: function(e)
      {
        $("#cajas_permitidas").html(e)
      }
    }
  )
  .fail(function(e)
  {
    msjes_swal("Error",e,"error")
  })
}