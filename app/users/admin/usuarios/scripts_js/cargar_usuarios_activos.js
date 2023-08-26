function cargarUsuariosActivos()
{
  $.ajax(
    {
      url: "scripts/read_usuarios_activos.php",
      type: "POST",
      success: function(e)
      {
        $("#us_creados").html(e);
      }
    }
  )
  .fail(function(e)
  {
    msjes_swal("Error",e,"error")
  })
}