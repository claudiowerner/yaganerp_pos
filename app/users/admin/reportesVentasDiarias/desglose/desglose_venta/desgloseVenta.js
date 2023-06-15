
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
      let propina = 0;
      let valorTotal = 0;
      let tasks = JSON.parse(response);
      let template = '';
      let nomMesa = "";
      let estado_venta = "";
        tasks.forEach(c=>{
          if(c.estado_venta  == "CERRADO")
          {
            valor=parseFloat(valor)+parseFloat(c.valor);
            propina=parseFloat(propina)+parseFloat(c.propina);
            valorTotal=parseFloat(valorTotal)+parseFloat(c.valor_total);
          }
          template+=
          `<tr idVenta=${c.id_venta} class='${c.estado}'>
            <td>${c.nombre}</td>
            <td>${c.estado_prod}</td>
            <td>${c.fecha}</td>
            <td>${c.nombre_prod}</td>
            <td>${c.cantidad}</td>
            <td>${c.metodo_pago}</td>
            <td>$${c.valor}</td>
            <td>$${c.propina}</td>
            <td>$${c.valor_total}</td>
          </tr>`;
          nomMesa = c.nom_mesa;
          estado_venta = c.estado_venta;
        });
        template +=
        `<tr>
          <td colspan=6 align=right>
            <strong>Total:</strong>
          </td>
          <td>
            <strong>$${valor}</strong>
          </td>
          <td>
            <strong>$${propina}</strong>
          </td>
          <td>
            <strong>$${valorTotal}</strong>
          </td>
        </tr>`;
        $("#bodyDesgloseVenta").html(template);
        $("#nombre_mesa").html(nomMesa);
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