cargarProducto();
function cargarProducto()
{
  $.ajax(
    {
      url:"func_php/read_productos.php",
      type: "POST",
      success: function(response)
      {
        let tasks = JSON.parse(response);
        let template = '<option value="N">---SELECCIONE---</option>';
          tasks.forEach(p=>{
            cantidad = parseInt(p.cantidad);
            stock = parseInt(p.stock_minimo);

            if(cantidad<stock)
            {
              template+=`<option value="${p.id}">${p.codigo_barra} - ${p.nombre_prod} -- STOCK CRÍTICO</option>`;
            }
            else
            {
              template+=`<option value="${p.id}">${p.codigo_barra} - ${p.nombre_prod}</option>`;
            }
          });
          $("#prod").html(template);
    }
  }).fail( function(e) {
    console.log( 'Error productos!!'+e.responseText );
  }).done( function() {
    console.log( 'done productos' );
  }).always( function() {
    console.log( 'Always productos' );
  });
}