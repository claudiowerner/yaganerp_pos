
var table;


//se compara si está habilitado el conteo de stock mínimo dentro de la base de datos o no
let estadoStock = comprobarEstadoStockMinimo();
let cantidadBD = 0;

//regisrar producto
let id_venta = "";
let idUbic = "";
let idProd = "";
let cantProd = "";
let obs = "";

//variable que almacena el nombre del producto y la cantidad
var descProd = new Array();
$("#cantProd").val(1);
$("#prod").select2();

//arreglo obtener ID
let array = new Array();

//obtener número de mesa
let nCaja = $("#nCaja").html();

//se verifica si la opcion seleccionada de la venta de productos es válida o no
function productoValido()
{
  let valor = $("#prod").val();
  if(valor=="N")
  {
    $("#btnAgregarVenta").attr("disabled", true);
  }
  else
  {
    $("#btnAgregarVenta").attr("disabled", false);
  }
}


$(".agregar").on('click', function(e)
{
  let id_venta = $("#id_venta").text();
  let idProd = $("#prod").val();
  let cantProd = $("#cantProd").text();
  let idCaja = $("#nCaja").text();
  let nomCaja = $("#nomCaja").text();
  //capturar hora
  let hora = getHora();

  if(obs==''||obs==null)
  {
    obs = 'Sin obs.';
  }

  
  if (estadoStock.match("S"))
  {
    //se obtiene la cantidad para ser comparada y decidir si se hace la venta o no 
    cantidadBD = parseInt(comprobarCantidad(idProd));
    if(cantProd>cantidadBD)
    {
      swal(
        {
          title: "Aviso",
          text: "Cantidad insuficiente. No se agregó la venta.",
          icon: "warning"
        }
      )
    }
    else
    {
      registrarVenta(id_venta, idProd, cantProd, idCaja, nomCaja, hora)
    } 
  }
  else
  {
    registrarVenta(id_venta, idProd, cantProd, idCaja, nomCaja, hora)
  }
})

$("#btnEliminarVenta").on('click', function(e)
{
  let id = $("#anVenta").text();
  let clave = $("#clave").val();
  if(clave=='')
  {
    $("#msjClave").html("<span style='color: red'>Debe rellenar el campo</span>");
  }
  else
  {
    $("#msjClave").html("<span style='color: red'></span>");
    $.ajax({
      url: "func_php/clave_aut.php?clave="+clave,
      type: "GET",
      success: function(r)
      {
        if(r==0||r.match(/Fatal error.*/))
        {
          $("#msjClave").html("<span style='color: red'>La clave ingresada no es correcta</span>");
        }
        else
        {
          $.ajax({
            url: "func_php/elim_venta_exe.php",
            data: {"id_venta":id},
            type: "POST",
            success: function(r)
            {
              swal({
                title: "Excelente",
                text: r,
                icon: "success",
              });
              cargarVentasCaja();
              cargarVentaGeneral();
              $('#solicClaveAut').modal('hide');
            }
          }).fail( function(e) {
            console.log( 'Error eliminar venta!!'+e.responseText );
          }).done( function() {
            console.log( 'done eliminar venta' );
          }).always( function() {
            console.log( 'Always eliminar venta' );
          });
        }
      }
    }).fail( function(e) {
      console.log( 'Error eliminar venta!!'+e.responseText );
    }).done( function() {
      console.log( 'done eliminar venta' );
    }).always( function() {
      console.log( 'Always eliminar venta' );
    });
  }
});


$("#pagarVenta").on("click", function(e)
{
  $("#modalMetodoPago").modal("show");
})

$("#btnConfirmarPaga").on('click', function(e)
{
  swal({
    title: "¿Está seguro?",
    text: "¿Desea registrar el pago completo?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((pagar) => {
    if (pagar)
    {
      confirmarPaga();
    } 
    else 
    {
      swal("Operación cancelada");
    }
  });
});


$("#btnCrearVenta").on("click", function(e)
{
  //esta función se ubica en el archivo correlativo.js
  correlativo();
})




var ventaInd = 0;

//array para rebajar stock según venta individual
let descProdInd = new Array();

//acciones impresion venta individual
let valorCuentaInd = 0;
// array para imprimir cuenta individual según IDs
let arrayCuentaIndividual = new Array();


//asignar valor a Check en caso de que se marque o desmarque un checkbox
let check = 0;
function checkSeleccionado(checkbox)
{
  if(checkbox.checked)
  {
    check++;
  }
  else
  {
    check--;
  }
}
//obtener número de ventas seleccionadas a pagar 
function contadorVentas(id_venta)
{
  $.ajax(
  {
    url:"func_php/contador_ventas_pagadas.php?id_venta="+id_venta,
    type:"GET",
    success: function(e)
    {
      let resp = parseInt(e);
      if(resp==ventasCheckeadas||resp==0)
      {
        pagarVenta(true);
      }
    }
  })
  .fail(function(e)
  {
    swal({
      title: "Error",
      text: e,
      icon: "error",
    });
  })
}

function confirmarPaga(boton)
{
  let id = $("#id_venta").text();
  let nCaja = $("#nCaja").text(); 
  let totalVenta = $("#totalVenta").text();
  let fecha = getFechaBD();
  let hora = getHora();
  let idCaja = $("#id_caja").text();
  let formaPago = $("#metodoPagoGral").val();

  $.ajax({
    url: "func_php/pagar_venta_exe.php?nCaja="+nCaja+"&totalVenta="+totalVenta+"&producto="+descProd+"&fecha="+fecha+"&hora="+hora+"&idCaja="+idCaja+"&forma_pago="+formaPago+"&id_venta="+id,
    data: {'producto': descProd},
    type: "GET",
    success: function(e)
    {
      swal({
        title: "Excelente",
        text: e,
        icon: "success",
      });
      id_usuario = "";
      //obtener ID de usuario/cliente
      $.ajax(
        {
          url: "../../user.php",
          type: "POST",
          async:false,
          success: function(e)
          {
            id_usuario = e;
          }
        }
      )

      nCaja = $("#nCaja").text();
      idVenta = parseInt($("#id_venta").text());
      fecha = getFechaBD();
      hora = getHora();
      formaPago = $("#metodoPagoGral").val();
      neto = $("#valorNeto").text();
      folio = $("#id_venta").text();
      fecha = getFechaBD()+" "+getHora();

      datos = {
        "idVenta": idVenta
      }
      
      $.ajax(
        {
          url: "https://192.168.1.20/impresion_yaganerp/vendor/ticket.php",
          data: datos,
          type: "POST",
          success: function(e)
          {
            swal(
              {
                title: "Excelente",
                text: e,
                icon: "success"
              }
            )
          }
        }
      )


      cargarVentasCaja();
      cargarVentaGeneral();
      /*si el número de botón seleccionado es 2 (btnPagarVenta), se mostrará el mensaje de venta exitosa y
      se vuelve al apartado donde se muestran las mesas*/
    }
  })
  .fail(function(e)
  {
    swal({
      title: "Error",
      text: "Error al intentar imprimir: "+e.responseText,
      icon: "error",
    });
  })
}

function registrarVenta(id_venta, idProd, cantProd, idCaja, nomCaja, hora)
{
  $.ajax(
    {
      url:"func_php/crear_venta_exe.php?idCaja="+idCaja+"&id_venta="+id_venta+"&idProd="+idProd+"&cantProd="+cantProd+"&nomCaja="+nomCaja+"&hora="+hora,
      type: "GET",
      success: function(r)
      {
        cargarVentasCaja();
      }
    }).fail( function(e) {
      console.log( 'Error productos!!'+e.responseText );
    }).done( function() {
      console.log( 'done productos' );
    }).always( function() {
      console.log( 'Always productos' );
    });
}

