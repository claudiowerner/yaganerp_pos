$("#cierreCaja").on('click', 'button.btn-danger', function(e)
{
  let element = $(this)[0].parentElement.parentElement;
  let id = $(element).attr('idCierre');
  let nomCaja = $(element).attr('nomCaja');
  $("#nomCaja").html(nomCaja);
  $("#nCaja").html(id);
  $("#idCierre").html(id);
  //valida si se solicita la clave de autorizacion para cerrar caja o no
  let solicitar = validarSolicitudClave();
  
  swal({
    title: "¿Seguro?",
    text: 
    `¿Desea cerrar este turno/caja?`,
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((cerrar) => {
    if (cerrar)
    {
      if(solicitar.match(/N/))
      {
        cierreCaja();
      }
      else
      {
        $("#solicClaveAutCerrar").modal("show");
      }
    } 
    else 
    {
      swal("Operación cancelada");
    }
  });
  
});