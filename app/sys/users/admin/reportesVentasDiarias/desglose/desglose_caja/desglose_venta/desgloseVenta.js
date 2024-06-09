
leerCaja();
function leerCaja()
{
  let venta = $("#venta").text();
  $.ajax(
  {
    url: 'read_desglose_venta.php?idVenta='+venta,
    type: 'GET',
    success: function(response)
    {
      let valor = 0;
      let valor_formateado = 0;
      let iva = 0;
      let iva_formateado = 0;
      let valorTotal = 0;
      let valorTotal_formateado = 0;
      let desctoTotal = 0;
      let desctoTotal_formateado = 0;
      let tasks = JSON.parse(response);
      let template = '';
      let nomCaja = "";
      let estado_venta = "";
        tasks.forEach(c=>{
          $("#descto").html(c.descto)
          if(c.estado_venta  == "CERRADO")
          {
            valor=parseFloat(valor)+parseFloat(c.valor);
            valor_formateado = formatearNumero("P",valor);
            iva=parseFloat(iva)+parseFloat(c.iva);
            iva_formateado = formatearNumero("P",iva);
            valorTotal=parseFloat(valorTotal)+parseFloat(c.valor_total);
            valorTotal_formateado = formatearNumero("P",valorTotal);
            desctoTotal=parseFloat(desctoTotal)+parseFloat(c.valor_descuento);
            desctoTotal_formateado = formatearNumero("P",desctoTotal);
          }
          template+=
          `<tr idVenta=${c.id_venta} class='${c.estado}'>
            <td>${c.nombre}</td>
            <td>${c.estado_prod}</td>
            <td>${c.fecha}</td>
            <td>${c.nombre_prod}</td>
            <td>${c.cantidad}</td>
            <td>${c.metodo_pago}</td>
            <td>${formatearNumero("P",c.valor)}</td>
            <td>${formatearNumero("P",c.iva)}</td>
            <td>${formatearNumero("P",c.valor_descuento)}</td>
            <td>${formatearNumero("P",c.valor_total)}</td>
          </tr>`;
          nomCaja = c.nom_caja;
          estado_venta = c.estado_venta;
        });
        template +=
        `<tr>
          <td colspan=6 align=right>
            <strong>Total:</strong>
          </td>
          <td>
            <strong>${valor_formateado}</strong>
          </td>
          <td>
            <strong>${iva_formateado}</strong>
          </td>
          <td>
            <strong>${desctoTotal_formateado}</strong>
          </td>
          <td>
            <strong>${valorTotal_formateado}</strong>
          </td>
        </tr>`;
        $("#bodyDesgloseVenta").html(template);
        $("#nombre_mesa").html(nomCaja);
        $("#estadoVenta").html(estado_venta);
      }
    }
  )
  .done( function() {
    console.log( 'Success!!' );
  }).fail( function(resp) {
    console.log( 'Error!! '+resp.ResponseText );
  }).always( function() {
    console.log( 'Always' );
  });
}


$("#desgloseCaja").on("click", "button.btn-success", function()
{
  let element = $(this)[0].parentElement.parentElement;
  let id = $(element).attr('idVenta');
  location.href = "desglose_venta/index.php?idVenta="+id;
})