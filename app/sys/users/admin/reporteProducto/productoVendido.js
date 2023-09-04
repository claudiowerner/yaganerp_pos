
obtenerProducto();
function obtenerProducto()
{
  $.ajax(
  {
    url: 'read_producto_vendido.php',
    type: 'GET',
    success: function(response)
    {
      let tasks = JSON.parse(response);
      let template = '';
      valor_total = 0;
        tasks.forEach(c=>{
        template+=
        `<tr>
          <td>${c.nombre_cat}</td>
          <td>${c.nombre_prod}</td>
          <td>${c.cantidad}</td>
          <td>${c.valor_total}</td>
        </tr>`;
        valor_total = parseInt(c.valor_total) + parseInt(valor_total);
      });
      template+=
        `<tr>
          <td colspan=3 align=right><b>Total: </b></td>
          <td><b>$${valor_total}</b></td>
        </tr>`;
        $("#bodyProductoVendido").html(template);
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
};