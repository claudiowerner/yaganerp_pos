function cierreCaja()
{
  let cajaAbierta = validarCajasDeVentaAbierta();
  cajaAbierta = parseInt(cajaAbierta);

  if(cajaAbierta==0)
  {
    let idCierre = $("#idCierre").text(); 
    $.ajax(
    {
      url:"php/editar/cierre_caja.php?idCierre="+idCierre,
      data: "GET",
      success: function(e)
      {
        if(e.match(/No se puede cerrar/))
        {
          msjes_swal("Aviso", e, "warning");
        }
        else
        {
          msjes_swal("Excelente", e, "success");
          //imprimirResumenVenta("../../",idCierre);
        }
        $('#cierreCaja').DataTable().ajax.reload();
      }
    })
    .fail(function(e)
    {
      msjes_swal("Error", e, "error");
    })
  }
  else
  {
    msjes_swal("Aviso", "Se deben cerrar todas las cajas de atención al cliente que estén abiertas", "warning");
  }
}