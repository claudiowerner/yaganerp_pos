
obtenerVentasMesa();
function obtenerVentasMesa()
{
  $.ajax(
  {
    url: 'read_venta_caja.php',
    type: 'GET',
    success: function(response)
    {
      let tasks = JSON.parse(response);
      let template = '';
      valor_total = 0;
        tasks.forEach(c=>{
        template+=
        `<tr>
          <td>${c.caja}</td>
          <td>${c.nom_caja}</td>
          <td>${formatearNumero("V", c.ventas_caja)}</td>
          <td>${formatearNumero("P", c.valor_total)}</td>
        </tr>`;
        valor_total = parseInt(c.valor_total) + parseInt(valor_total);
      });
      template+=
        `<tr>
          <td colspan=3 align=right><b>Total: </b></td>
          <td><b>${formatearNumero("P", valor_total)}</b></td>
        </tr>`;
        $("#bodyProductoVendido").html(template); 
        $("#bodyVentaMesa").html(template);
      }
    }
  )
  .done( function() 
  {
    console.log( 'Success!!' );
  })
  .fail( function(resp) 
  {
    console.log( 'Error!! '+resp.ResponseText );
  })
  .always( function() 
  {
    console.log( 'Always' );
  });
};