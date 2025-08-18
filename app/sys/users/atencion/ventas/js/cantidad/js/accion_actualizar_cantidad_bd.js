$("#btnActCantidad").on('click', function(e)
{
  let id = $("#idVenta").text();
  let idProd = $("#id_prod").text();
  let cant = parseInt($("#cantProdMod").text());
  
  if(estadoStock == "S")
  {
    console.log("estado = S");
    //comprobar cantidad existente en la BD
    cantidadBD = parseInt(comprobarCantidad(idProd));

    if(cant==cantidadBD)
    {
      modificarCant(id, cant, idProd);
    }
    else
    {
      if(cant>=cantidadBD)
      {
        swal(
          {
            title: "Aviso",
            text: "Cantidad insuficiente. No se modificó la venta.",
            icon: "warning"
          }
        )
      }
      else
      {
        modificarCant(id, cant, idProd);
      }
    }
  }
  else
  {
    modificarCant(id, cant, idProd);
    aplicarPromo(idProd, id);
  }
})