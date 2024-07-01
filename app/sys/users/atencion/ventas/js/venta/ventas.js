$(document).on("ready", function(e)
{
  cargarVentasCaja();
});

//se compara si está habilitado el conteo de stock mínimo dentro de la base de datos o no
let estadoStock = comprobarEstadoStockMinimo();
let cantidadBD = 0;

//regisrar producto
let id_venta = "";
let idUbic = "";
let idProd = "";
let cantProd = "";
let obs = "";
let descto = 0;

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
    $("#venta").attr("disabled", true);
  }
  else
  {
    $("#venta").attr("disabled", false);
  }
}

$("#venta").on('click', function(e)
{
  let id_venta = $("#id_venta").text();
  let idProd = $("#prod").val();
  let cantProd = parseInt($("#cantProd").text());
  let idCaja = $("#nCaja").text();
  let nomCaja = $("#nomCaja").text();
  //capturar hora
  let hora = getHora();

  if(obs==''||obs==null)
  {
    obs = 'Sin obs.';
  }
  registrarVenta(id_venta, idProd, cantProd, idCaja, nomCaja, hora);
})



$("#pagarVenta").on("click", function(e)
{
  $("#modalMetodoPago").modal("show");
});


//aplicar descuento
$("#btnAplicarDescto").on("click", function(e)
{
  $("#modalDescuento").modal("show");
});

$("#btnConfirmarDescto").on("click", function(e)
{
  swal({
    title: "¿Está seguro?",
    text: "¿Desea aplicar descuento?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((pagar) => {
    if (pagar)
    {
      aplicarDescto();
      cargarDescto();
    } 
    else 
    {
      swal("Sin descuentos aplicados");
    }
  });
})


$("#btnAñadirCuenta").on("click", function(e)
{
  $("#modalAñadirCuenta").modal("show");
});

$("#btnAgregarCliente").on("click", function(e)
{
  //entregar rut previamente escrito desde modalAñadirCuenta al modalAgregarCuenta
  let rutAñadir = $("#txtRut").val();
  $("#txtRutGuardar").val(rutAñadir);

  
  let valRut = fnValidarRut.validaRut(rutAñadir);

  lblRutValido(valRut);

  //mostrar modals
  $("#modalAgregarCliente").modal("show");
  $("#modalAñadirCuenta").modal("hide");
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
      let id = $("#id_venta").text();
      let formaPago = $("#metodoPagoGral").val();
      confirmarPaga("ticket.php",id, formaPago);
      cargarCorrelativo();
      cargarVentasCaja();
      llenarSelectProducto();
    } 
    else 
    {
      swal("Operación cancelada");
    }
  });
});  


$("#btnCrearVenta").on("click", function(e)
{
  cargarCorrelativo();
  cargarVentasCaja();
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
    msjes_swal("Error", e, "error");
  })
}