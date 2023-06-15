comprobarComandaCocina();
comprobarComandaBar();

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
let idMesa = "";
let nomMesa = "";
//obtener tipo de venta (si es normal/convenio)
let tipoVenta = "";

//variable que almacena el nombre del producto y la cantidad
var descProd = new Array();
$("#cantProd").val(1);
$("#prod").select2();

//arreglo obtener ID
let array = new Array();

//obtener número de mesa
let nMesa = $("#nMesa").html();

//obtener variable de tipo de venta (N o C)
let varTipoVenta = ""; 

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
if(tipoVenta.match(/Iden/))
{
  $.ajax(
    {
      url: "func_php/read_tipo_venta.php?nMesa="+nMesa,
      type: "GET",
      success: function(e)
      {
        if(e.match("N"))
        {
          $("#tipoDeVenta").html("Normal");
          $("#tv").html("N");
        }
        if(e.match("C"))
        {
          $("#tipoDeVenta").html("Convenio");
          $("#tv").html("C");
        }
      }
    }
  )
  .fail(function(e)
  {
    console.log(e.responseText)
  })
}



$("#btnAgregarVenta").on('click', function(e)
{
  let id_venta = $("#id_venta").text();
  let idUbic = $("#idUbic").text();
  let idProd = $("#prod").val();
  let cantProd = $("#cantProd").text();
  let obs = $("#obs").val();
  let tipoVenta = $("#tv").text();
  let idMesa = $("#nMesa").text();
  let nomMesa = $("#nomMesa").text();
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
      registrarVenta(id_venta, idUbic, idProd, cantProd, obs, tipoVenta, idMesa, nomMesa, hora);
    } 
  }
  else
  {
    alert("PASA AL ELSE: "+estadoStock);
    registrarVenta(id_venta, idUbic, idProd, cantProd, obs, tipoVenta, idMesa, nomMesa, hora);
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
              cargarVentasMesa();
              cargarVentaInd();
              cargarVentaGeneral();
              comprobarComandaCocina();
              comprobarComandaBar();
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

$("#btnAnular").on('click', function(e)
{
  idVenta = $("#id_venta").text();
  nMesa = $("#nMesa").text();
  $("#anVentaAnular").html(idVenta);
  $("#mesaAnular").html(nMesa);
});

$("#btnAnularVenta").on('click', function(e)
{
  let corr = $("#anVentaAnular").text();
  let clave = $("#claveAnular").val();
  let nMesa = $("#mesaAnular").text();
  if(clave=='')
  {
    $("#msjClaveAnular").html("<span style='color: red'>Debe rellenar el campo</span>");
  }
  else
  {
    $("#msjClaveAnular").html("<span style='color: red'></span>");
    $.ajax({
      url: "func_php/clave_aut.php",
      data: {"clave":clave},
      type: "GET",
      success: function(r)
      {
        if(r==0||r.match(/Fatal error.*/))
        {
          $("#msjClaveAnular").html("<span style='color: red'>La clave ingresada no es correcta</span>");
        }
        else
        {
          let hora = getHora();
          $.ajax({
            url: "func_php/anular_venta_exe.php?corr="+corr+"&hora="+hora+"&nMesa="+nMesa,
            type: "POST",
            success: function(r)
            {
              let msje = r;
              swal({
                title: "Excelente",
                text: e,
                icon: "success",
              });
              if(msje=="Venta anulada correctamente"||msje.match(/Venta anulada correctamente/))
              {
                location.href = '../';
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
      }
    }).fail( function(e) {
      console.log( 'Error eliminar venta!!'+e.responseText );
    }).done( function() {
      console.log( 'done eliminar venta' );
    }).always( function() {
      console.log( 'Always eliminar venta' );
    });
  }
})

$("#btnActCantidad").on('click', function(e)
{
  let id = $("#idVenta").text();
  let cant = parseInt($("#cantProdMod").text());
  let idProd = $("#id_prod").text();

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

$("#btnPagoCtaGral").on('click', function(e)
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

$("#btnPagoInd").on('click', function(e)
{
  arr = JSON.stringify(descProdInd);
  arrJson = JSON.parse(arr)
  productos = "";
  arrJson.forEach(j=>
    {
      productos += j.producto +" x"+j.cantidad+"\n";
    }
  )
  
  valorNeto = $("#valorIndividual").text();
  propina = $("#propinaIndividual").text();
  total = $("#totalIndividual").texttotal
  
  idCaja = $("#id_caja").text();

  swal({
    title: "¿Está seguro?",
    text: "¿Desea realizar el pago de los siguientes productos?\n"+productos,
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((pagar) => {
    if (pagar)
    {
      formaPago = $("#metodoPagoInd").val();
      $.ajax({
        url:"func_php/pagar_venta_ind_exe.php?valor="+valorNeto+"&propina="+propina+"&forma_pago="+formaPago,
        data:{"descProdInd":descProdInd, "idCaja":idCaja},
        success: function(e)
        {
          cargarVentasMesa();
          cargarVentaInd();
          cargarVentaGeneral();
          swal({
            title: "Excelente",
            text: e,
            icon: "success",
          });
          ventaInd = 0;
          descProdInd = [];
        }
      })
      .fail(function(e)
      {
        swal({
          title: "Error",
          text: e,
          icon: "error",
        });
      });
      contadorVentas(id_venta);
    } 
    else 
    {
      swal("Operación cancelada");
    }
  });
});


$("#btnCerrar").on("click", function(e)
{
  let id = $("#id_venta").text();
  let idMesa = $("#idMesa").text(); 
  let subtotal = $("#subtotal").text();
  let propina = $("#propina").text();
  let total = $("#total").text();
  let fecha = getFechaBD();
  let hora = getHora();

  swal({
    title: "¿Está seguro?",
    text: "¿Desea cerrar esta venta?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((eliminarVenta) => {
    if (eliminarVenta)
    {
      nomMesa = $("#nomMesa").text();
      idUbic = $("#idUbic").text();
      $.ajax(
        {
          url:"func_php/comprobar_venta_activa.php",
          data:{"nMesa": nMesa, "nom_mesa":nomMesa},
          type: "POST",
          success: function (e)
          {
            /*Si e==1, quiere decir que si existen productos SIN PAGAR, por lo que no se permitirá cerrar la mesa
            si existen ventas o productos sin pagar*/
  
            if(e==1)
            {
              swal({
                title: "Error",
                text: "¡Existen productos sin pagar!",
                icon: "error",
              });
            }
            else
            {
              //cierre de mesa
              data = {
                "idMesa":idMesa,
                "id_venta":id,
                "nomMesa":nomMesa,
                "idUbic":idUbic,
                "fecha":fecha,
                "hora":hora
              }

              $.ajax({
                url:"func_php/cerrar_mesa.php",
                data: data,
                type: "POST",
                success: function(e)
                {
                  swal({
                    title: "Excelente",
                    text: e,
                    icon: "success",
                  });
                }
              })
              location.href = "../";
            }
          }
        }
      )
    }
    else
    {
      swal("Operación cancelada");
    }
  });
})


var ventaInd = 0;

//array para rebajar stock según venta individual
let descProdInd = new Array();

//acciones pago venta individual
$(document).on('click', "#checkPagarVentaInd", function(e)
{
  var tr = e.target.closest('tr');

  let idVentaInd = $(this).attr("venta");
  let valor = $(this).attr("valor");
  let propina = $(this).attr("propina");
  let prod = "";
  let cant = 0;
  let totalVenta = $("#totalVentaInd").text();
  let fecha = getFechaBD();
  let hora = getHora();
  let id_venta = $("#id_venta").text();//envío de correlativo;

  if(e.target.checked)
  {
    prod = tr.cells[1].innerText;
    cant = parseInt(tr.cells[2].innerText) + parseInt(cant);
    descProdInd.push({"correlativo":id_venta,"valor":valor,"propina":propina,"idVentaInd":idVentaInd,"producto":prod,"cantidad":cant,"totalVenta":totalVenta,"fecha":fecha,"hora":hora});
    ventaInd = parseInt(totalVenta)+parseInt(tr.cells[6].innerText);
  }
  else
  {
    ventaInd = ventaInd-parseInt(tr.cells[6].innerText);
    //obtener el index del array donde se ubica el ID del objeto a eliminar

    descProdInd = descProdInd.filter(pr => pr.idVentaInd != idVentaInd);
    ventaInd = parseInt(totalVenta)-parseInt(tr.cells[6].innerText);
  }
  $("#totalVentaInd").html(ventaInd);
});


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
  let nMesa = $("#nMesa").text(); 
  let subtotal = $("#subtotal").text();
  let propina = $("#propinaCuentaGeneral").text();
  let total = $("#total").text();
  let fecha = getFechaBD();
  let hora = getHora();
  let idCaja = $("#id_caja").text();
  let formaPago = $("#metodoPagoGral").val();

  $.ajax({
    url: "func_php/pagar_venta_exe.php?nMesa="+nMesa+"&valor="+subtotal+"&propina="+propina+"&total="+total+"&producto="+descProd+"&fecha="+fecha+"&hora="+hora+"&idCaja="+idCaja+"&forma_pago="+formaPago+"&id_venta="+id,
    data: {'producto': descProd},
    type: "GET",
    success: function(e)
    {
      swal({
        title: "Excelente",
        text: e,
        icon: "success",
      });
      cargarVentasMesa();
      cargarVentaGeneral();
      /*si el número de botón seleccionado es 2 (btnPagarVenta), se mostrará el mensaje de venta exitosa y
      se vuelve al apartado donde se muestran las mesas*/
    }
  })
  .fail(function(e)
  {
    swal({
      title: "Error",
      text: "Error paga venta: "+e.responseText,
      icon: "error",
    });
  })
}

function comprobarComandaCocina()
{
    let nMesa = $("#nMesa").text();
    $.ajax({
        url: "func_php/comprobar_comanda_cocina.php?nMesa="+nMesa,
        type: "GET",
        success: function(e)
        {
            if(e!=0)
            {
            $("#btnComandaCocina").attr("disabled", false);
            }
            else
            {
            $("#btnComandaCocina").attr("disabled", true);
            }
        }
    })
}

function comprobarComandaBar()
{
    let nMesa = $("#nMesa").text();
    $.ajax({
        url: "func_php/comprobar_comanda_bar.php?nMesa="+nMesa,
        type: "GET",
        success: function(e)
        {
            if(e!=0)
            {
            $("#btnComandaBar").attr("disabled", false);
            }
            else
            {
            $("#btnComandaBar").attr("disabled", true);
            }
        }
    })
}

function registrarVenta(id_venta, idUbic, idProd, cantProd, obs, tipoVenta, idMesa, nomMesa, hora)
{
  $.ajax(
    {
      url:"func_php/crear_venta_exe.php?idMesa="+idMesa+"&idUbic="+idUbic+"&id_venta="+id_venta+"&idProd="+idProd+"&cantProd="+cantProd+"&obs="+obs+"&nMesa="+nMesa+"&nomMesa="+nomMesa+"&hora="+hora+"&tipoVenta="+tipoVenta,
      type: "GET",
      success: function(r)
      {
        cargarVentasMesa();
        cargarVentaInd();
        cargarVentaGeneral();
        comprobarComandaCocina();
        comprobarComandaBar();
      }
    }).fail( function(e) {
      console.log( 'Error productos!!'+e.responseText );
    }).done( function() {
      console.log( 'done productos' );
    }).always( function() {
      console.log( 'Always productos' );
    });
}

function modificarCant(id, cant, idProd)
{
  $.ajax(
    {
      url:"func_php/editar_venta_exe.php?id="+id+"&cant="+cant+"&idProd="+idProd,
      type: "GET",
      success: function(r)
      {
        cargarVentasMesa();
        cargarVentaInd();
        cargarVentaGeneral();
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