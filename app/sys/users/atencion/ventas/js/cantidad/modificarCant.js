
//aumento de cantidad con botones


let pAgregado = $("#numProd").val();

$("#sumarCant").on('click', function(e)
{
  let cantProd = $("#cantProd").text();
  cantProd = parseInt(cantProd)+parseInt(1);
  $("#cantProd").html(cantProd);
});

$("#restarCant").on('click', function(e)
{
  let cantProd = $("#cantProd").text();
  cantProd = parseInt(cantProd)-parseInt(1);
  if(cantProd==0)
  {
    cantProd = 1;
  }
  $("#cantProd").html(cantProd);
});

$("#sumarCantMod").on('click', function(e)
{
  let numProd = $("#cantProdMod").text();
  pAgregado=parseFloat(numProd)+parseFloat(1);
  $("#cantProdMod").html(pAgregado);
});

$("#restarCantMod").on('click', function(e)
{
  let numProd = $("#cantProdMod").text();
  pAgregado=parseFloat(numProd)-parseFloat(1);
  if(pAgregado==0)
  {
    pAgregado = 1;
  }
  $("#cantProdMod").html(pAgregado);
});



//Acciones de cambio de cantidad en la BD
//Funcion que recibe el botón +o-. Además, obtiene la cantidad de cierto producto para ser eliminada


$("#btnActCantidad").on('click', function(e)
{
  let id = $("#idVenta").text();
  let idProd = $("#id_prod").text();
  let cant = parseInt($("#cantProdMod").text());
  //id = $("");
  if(estadoStock == "S")
  {
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
  }
})




async function obtenerIDVenta(boton)
{
  let id = $(boton).attr("id");
  let cant = $(boton).attr("cant");
  let id_prod = $(boton).attr("id_prod");
  let pesaje = $(boton).attr("pesaje");

  
  if(pesaje.match("S"))
  {
    $("#cambiarCantidadPesaje").modal("show");
    
    $("#idVentaPesaje").html(id);
    $("#cantProdModPesaje").html(cant);
    $("#id_prodPesaje").html(id_prod);
  }
  if(pesaje.match("N"))
  {
    $("#cambiarCantidad").modal("show");

    //
    $("#idVenta").html(id);
    $("#cantProdMod").html(cant);
    $("#id_prod").html(id_prod);
  }
  
}

$("#btnActCantidadPesaje").on("click", function(e)
{
  
  let id = $("#idVentaPesaje").text();
  let idProd = $("#id_prodPesaje").text();
  let cantidad = parseFloat($("#cantModPesaje").val());
  modificarCant(id, cantidad, idProd);
})

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