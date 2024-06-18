//descargar productos desde la BD
function descargarProducto()
{
  return $.ajax(
    {
      url:"func_php/read_productos.php",
      type: "POST",
      async: false
    }).responseText;
}


//rellenar select de productos
function llenarSelectProducto()
{
  let descarga = descargarProducto();
  let json = JSON.parse(descarga);

  let template = '<option value="N">---SELECCIONE---</option>';
  json.forEach(p=>
  {
    cantidad = parseInt(p.cantidad);
    stock = parseInt(p.stock_minimo);

    //si el stock es menor o igual al stock mínimo
    if(cantidad<stock)
    {
      template+=`<option value="${p.id}">${p.codigo_barra} - ${p.nombre_prod} - ${p.nombre_cat} -- STOCK CRÍTICO (`+p.cantidad+`)</option>`;
    }
    //si la cantidad es mayor al stock mínimo
    if(cantidad>stock)    
    {
      template+=`<option value="${p.id}">${p.codigo_barra} - ${p.nombre_prod} - ${p.nombre_cat} (`+p.cantidad+`)</option>`;
    }
    $("#prod").html(template);
  });

}

llenarSelectProducto();