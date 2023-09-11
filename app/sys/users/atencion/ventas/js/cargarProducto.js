cargarProducto();
function cargarProducto()
{
  $.ajax(
    {
      url:"func_php/read_productos.php",
      type: "POST",
      success: function(response)
      {
        try
        {
          let tasks = JSON.parse(response);
          let template = '<option value="N">---SELECCIONE---</option>';
          tasks.forEach(p=>
          {
            cantidad = parseInt(p.cantidad);
            stock = parseInt(p.stock_minimo);

            if(cantidad<stock)
            {
              template+=`<option value="${p.id}">${p.codigo_barra} - ${p.nombre_prod} - ${p.nombre_cat} -- STOCK CRÍTICO</option>`;
            }
            else
            {
              template+=`<option value="${p.id}">${p.codigo_barra} - ${p.nombre_prod} - ${p.nombre_cat}</option>`;
            }
            $("#prod").html(template);
          });
        }
        catch(e)
        {
          $("#prod").html("<option>SIN PRODUCTOS</option>");
        }
      }
    }).fail( function(e) {
      console.log( 'Error productos!!'+e.responseText );
    }).done( function() {
      console.log( 'done productos' );
    }).always( function() {
      console.log( 'Always productos' );
    });
}