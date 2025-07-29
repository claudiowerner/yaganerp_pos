$("#btnValidarCierre").on('click', function(e)
{
  let solicitar = validarSolicitudClave();
  let clave = $("#claveCerrarCaja").val();
  if(clave=='')
  {
    $("#msjClave").html("<span style='color: red'>Debe rellenar el campo</span>");
  }
  else
  {
    //ajax autorizacion clave
    $.ajax(
    {
      url:"php/leer/clave_aut.php",
      data: {"clave": clave},
      type: "POST",
      success: function(e)
      {
        clave = e;
        if(clave==1)
        {
          $('#solicClaveAutCerrar').modal('hide');
          //ajax cerrar caja
          cierreCaja();
          
        }
        else
        {
          $("#msjClave").html("<span style='color: red'>Clave incorrecta</span>");
        }
      }
    })
    .fail(function(e)
    {
      msjes_swal("Error", e, "error");
    })
  }
});
