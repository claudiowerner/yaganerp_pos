function confirmarPaga(ticket, id, formaPago)
{
  let nCaja = $("#nCaja").text();
  let totalVenta = $("#totalVenta").text();
  let fecha = getFechaBD();
  let hora = getHora();
  let idCaja = $("#id_caja").text();
  $.ajax({
    url: "func_php/pagar_venta_exe.php?nCaja="+nCaja+"&totalVenta="+totalVenta+"&producto="+descProd+"&fecha="+fecha+"&hora="+hora+"&idCaja="+idCaja+"&forma_pago="+formaPago+"&id_venta="+id+"&idCierre="+idCaja,
    data: {'producto': descProd},
    type: "GET",
    success: function(e)
    {
      msjes_swal("Excelente", e, "success");
      $("#btnPagarVenta").prop("disabled", true);
      $("#btnAnularVenta").prop("disabled", true);
      $("#btnAñadirCuenta").prop("disabled", true);
      id_usuario = "";
      //obtener ID de usuario/cliente
      $.ajax(
        {
          url: "../../user.php",
          type: "POST",
          async:false,
          success: function(e)
          {
            id_usuario = e;
          }
        }
      )
      imprimirBoleta(ticket, id);


      cargarVentasCaja();
      
      /*si el número de botón seleccionado es 2 (btnPagarVenta), se mostrará el mensaje de venta exitosa y
      se vuelve al apartado donde se muestran las mesas*/
    }
  })
  .fail(function(e)
  {
    msjes_swal("Error", "Error al intentar imprimir: "+e.responseText, "error");
  })
}