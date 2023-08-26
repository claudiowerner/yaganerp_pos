function cargarCajasActivas()
{
  $.ajax(
    {
      url: "script_php/read_cajas_activas.php",
      type: "POST",
      success: function(e)
      {
        $("#cajas_creadas").html(e);
      }
    }
  )
  .fail(function(e)
  {
    msjes_swal("Error",e,"error")
  })
}