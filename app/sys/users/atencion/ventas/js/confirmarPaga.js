function confirmarPaga(ticket, id, formaPago)
{
  let nCaja = $("#nCaja").text();
  let totalVenta = $("#totalVenta").text();
  let fecha = getFechaBD();
  let hora = getHora();
  let idCaja = $("#id_caja").text();
  let nomCaja = $("#nomCaja").text();
  let descto = parseFloat($("#descuento").text()/100);

  let datos = {
    "id_venta":id,
    "nCaja": nCaja,
    "totalVenta": totalVenta,
    "producto": descProd,
    "fecha": fecha,
    "hora": hora,
    "idCaja": idCaja,
    "forma_pago": formaPago,
    "id_venta": id,
    "idCierre": idCaja,
    "nomCaja": nomCaja,
    "producto": descProd,
    "descto": descto
  }

  $.ajax({
    url: "func_php/pagar_venta_total.php",
    data: datos,
    type: "POST",
    success: function(e)
    {
      //se vacía el array descProd;
      msjes_swal("Excelente", e, "success");
      $("#btnPagarVenta").prop("disabled", true);
      $("#btnAnularVenta").prop("disabled", true);
      $("#btnAñadirCuenta").prop("disabled", true);
      $("#btnCrearVenta").prop("disabled", false);
      id_usuario = "";
      //obtener ID de usuario/cliente
      $.ajax
      (
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
      .fail(function(e)
      {
        msjes_swal("Error", "Error al obtener ID de usuario: "+e.responseText, "error");
      })
      imprimirBoleta(ticket, id);
      
      /*si el número de botón seleccionado es 2 (btnPagarVenta), se mostrará el mensaje de venta exitosa y
      se vuelve al apartado donde se muestran las mesas*/

      descProd = new Array();
      let rut = $("#spanRut").text();
      cargarCuentasCliente(rut);
    }
  })
  
}


function confirmarPagaCuenta(ticket, id, formaPago)
{
  let nCaja = $("#nCaja").text();
  let totalVenta = $("#totalVenta").text();
  let fecha = getFechaBD();
  let hora = getHora();
  let idCaja = $("#id_caja").text();
  let nomCaja = $("#nomCaja").text();

  let datos = {
    "nCaja": nCaja,
    "totalVenta": totalVenta,
    "producto": descProd,
    "fecha": fecha,
    "hora": hora,
    "idCaja": idCaja,
    "forma_pago": formaPago,
    "id_venta": id,
    "idCierre": idCaja,
    "nomCaja": nomCaja
  }

  $.ajax({
    url: "func_php/pagar_venta_cuenta.php",
    data: datos,
    type: "POST",
    success: function(e)
    {
      //se vacía el array descProd;
      msjes_swal("Excelente", e, "success");
      $("#btnPagarVenta").prop("disabled", true);
      $("#btnAnularVenta").prop("disabled", true);
      $("#btnAñadirCuenta").prop("disabled", true);
      $("#btnCrearVenta").prop("disabled", false);
      id_usuario = "";
      //obtener ID de usuario/cliente
      $.ajax
      (
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
      .fail(function(e)
      {
        msjes_swal("Error", "Error al obtener ID de usuario: "+e.responseText, "error");
      })
      //imprimirBoleta(ticket, id);
      
      /*si el número de botón seleccionado es 2 (btnPagarVenta), se mostrará el mensaje de venta exitosa y
      se vuelve al apartado donde se muestran las mesas*/

      descProd = new Array();
      let rut = $("#spanRut").text();
      cargarCuentasCliente(rut);
    }
  })
  
}