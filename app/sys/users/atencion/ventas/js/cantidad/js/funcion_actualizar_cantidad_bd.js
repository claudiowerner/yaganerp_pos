function modificarCant(id, cant, idProd)
{
  $.ajax(
    {
      url:"func_php/venta/editar_venta_exe.php?id="+id+"&cant="+cant+"&idProd="+idProd,
      type: "GET",
      success: function(r)
      {
        cargarVentasCaja();
      }
    })
    .fail( function(e) 
    {
      console.log( 'Error modificar productos!!'+e.responseText );
    })
    .done( function() 
    {
      console.log( 'done modificar productos' );
    })
    .always( function() 
    {
      console.log( 'Always modificar productos' );
    });
}