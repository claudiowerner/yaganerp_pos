function cargarUsuariosPermitidos()
{
  $.ajax(
    {
      url: "scripts/read_usuarios_permitidos.php",
      type: "POST",
      async: false, 
      success: function(e)
      {
        $("#us_permitidos").html(e)
      }
    }
  )
  .fail(function(e)
  {
    msjes_swal("Error",e,"error")
  })
}