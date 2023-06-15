ep = ""; //almacena el estado del piso
$("#swEditarProducto").on("click", function(e)
{
  if(e.target.checked)
  {
    ep = "S";
  }
  else
  {
    ep = "N";
  }
})

var table;

//cargar estado de trabajo con o sin stock (activado o desactivado)
$.ajax({
  url:"read_config_productos.php",
  type: "POST",
  success: function(e)
  {
    if(e.match("S"))
    {
      $("#cantidad").attr("disabled", false);
      $("#cantidadEditar").attr("disabled", false);
      $("#cantidad").val("Stock desactivado")
    }
    else
    {
      $("#cantidad").attr("disabled", true);
      $("#cantidadEditar").attr("disabled", true);
      $("#cantidad").val("Stock desactivado")
    }
  }
})

cargarCategoria();

    //Datatable
    var idCat = 0;
    table = $('#producto').DataTable({
      "createdRow": function( row, data, dataIndex){
        if( data.estado ==  `ACTIVO`){
          $(row).addClass('ACTIVO');
        }
        else
        {
          $(row).addClass('INACTIVO');
        }
      },

        "ajax":{
          "url":"read_productos.php",
          "type":"GET",
          "dataSrc":""
        },
        //columnas
        "columns":[
          {"data":"id"},
          {"data":"nombre_prod"},
          {"data":"nombre_cat"},
          {"data":"cantidad"},
          {"data":"valor_neto"},
          {"data":"valor_venta"},
          {"data":"estado"},
          {"data":"es_acom"},
          {"data":"tiene_acom"},
          {"data":"comanda_cocina"},
          {"data":"comanda_bar"},
          {"data":"fecha_reg"},
          {
              "defaultContent": '<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar" id="btnEditar"><img src="../img/edit.png" width="15"></button>'
          }
        ],

        //Configuración de Datatable
        "iDisplayLength": 10,
        "language": {
          "lenghtMenu":"Mostrar _MENU_ registros",
          "zeroRecords": "No se encontraron resultados.",
          "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
          "infoFiltered": "(filtrado de un total de _MAX_ registros)",
          "sSearch":"Buscar",
          "oPaginate":{
            "sFirst":"Primero",
            "sLast":"Último",
            "sNext":"Siguiente",
            "sPrevious":"Anterior"
          }
        }
      });
function cargarCategoria()
{
    
  $.ajax({

    url:"read_categorias.php",
    type: "POST",
    success: function(response)
    {
      let tasks = JSON.parse(response);
      let template = '<option value="O">---SELECCIONE---</option>';
      tasks.forEach(cat=>{
        template+=`<option value="${cat.id}">${cat.nombre_cat}</option>`;
      });
      $("#listCat").html(template);
      $("#listCatEditar").html(template);
    }
  }).fail( function(e) {
      console.log( 'Error!!'+e.responseText );
  }).always( function() {
      console.log( 'Always categoria' );
  });
}

$("#producto").on('click', 'tr', function(e)
{
  e.preventDefault();
  var cat = $('#producto').DataTable();
  var datos = cat.row(this).data();
  
  $.ajax(
  {
    url:"read_categorias_prod_especifico.php",
    type: "POST",
    data: {"nomCat": datos.nombre_cat},
    success: function(e)
    {
      let tasks = JSON.parse(e);
      tasks.forEach(cat=>{
        $("#listCatEditar").val(cat.id);
        if(datos.estado == "ACTIVO")
        {
          $("#swEditarProducto").prop("checked", true);
          ep = "S";
        }
        else
        {
          $("#swEditarProducto").prop("checked", false);
          ep = "N";
        }
      });
    }
  })
  .fail(function (r)
  {
    console.log("fail ajax producto: "+e.responseText);
  })

  $.ajax(
  {
    url:"read_productos_especifico.php",
    type: "POST",
    data: {"id_prod":datos.id},
    success: function(response)
    {
      let respuesta = JSON.parse(response)
      if(Array.isArray(respuesta))
      {
        respuesta.forEach(r=>
        {
          $("#estadoCatEditar").val(r.estado);
          $("#esAcomEditar").val(r.es_acom);
          $("#tieneAcomEditar").val(r.tiene_acom);
          $("#comandaCocinaEditar").val(r.comanda_cocina);
          $("#comandaBarEditar").val(r.comanda_bar);
        })
      }
    }
  })
  .fail(function (r)
  {
    console.log("fail ajax producto: "+e.responseText);
  })

  $("#nomProdEditar").val(datos.nombre_prod);
  $("#valorNetoEditar").val(datos.valor_neto);
  $("#valorVentaEditar").val(datos.valor_venta);
  $("#cantidadEditar").val(datos.cantidad);
  
  $("#tituloModalEditar").html(datos.id);

  //verificar si se seleccionó el botón desactivar o no
  let btn_desact = false;
  //si se presiona el botón btnDesact, el estado de btn_desact cambia a true
  $("#btnDesact").on('click', function(e)
  {
    btn_desact=true;
  });

});
$("#formRegistroProducto").submit(function(e)
{
  e.preventDefault();
  var np = $("#nomProd").val();
  var lc = $("#listCat").val();
  var can = $("#cantidad").val();
  var vn = $("#valorNeto").val();
  var vv = $("#valorVenta").val();
  var ea = $("#esAcom").val();
  var ta = $("#tieneAcom").val();
  var cc = $("#comandaCocina").val();
  var cb = $("#comandaBar").val();

  if(lc=="O"||ea=="O"||ta=="O"||cc=="O"||cb=="O")
  {
    if(lc=="O")
    {
      $("#errCategoria").html("Debe seleccionar una categoría válida.");
    }
    if(lc!="O")
    {
      $("#errCategoria").html("");
    }
    if(ea=="O")
    {
      $("#errAcom").html("Debe seleccionar una opción válida.");
    }
    if(ea!="O")
    {
      $("#errAcom").html("");
    }
    if(ta=="O")
    {
      $("#errTieneAcom").html("Debe seleccionar una opción válida.");
    }
    if(ta!="O")
    {
      $("#errTieneAcom").html("");
    }
    if(cc=="O")
    {
      $("#errComandaCocina").html("Debe seleccionar una opción válida.");
    }
    if(cc!="O")
    {
      $("#errComandaCocina").html("");
    }
    if(cb=="O")
    {
      $("#errComandaBar").html("Debe seleccionar una opción válida.");
    }
    if(cb!="O")
    {
      $("#errComandaBar").html("");
    }
  }
  else
  {
    //comprobar existencia de nombre del producto


    $.ajax({
      url:"validar_nombre_producto.php",
      data: {"nombre":np},
      type: "POST",
      success: function(e)
      {
        if(e==1)
        {
          swal({
            title: "Aviso",
            text: "Ya existe un producto con el nombre "+np,
            icon: "warning",
          });
        }
        else
        {
          $.ajax(
        {
            url:"func_phpcrear_producto_exe.php?nomProd="+np+"&cat="+lc+"&can="+can+"&vn="+vn+"&vv="+vv+"&ea="+ea+"&ta="+ta+"&cc="+cc+"&cb="+cb,
            type: "POST",
            success: function(e)
            {
              if(e.match("correctamente"))
              {
                swal({
                  title: "Excelente",
                  text: e,
                  icon: "success",
                });
              }
              if(e.match("No se puede desactivar el piso porque existen ubicaciones activadas"))
              {
                swal({
                  title: "Aviso",
                  text: e,
                  icon: "warning",
                });
              }
              if(e.match("Error")||e.match("error"))
              {
                swal({
                  title: "Error al modificar",
                  text: e,
                  icon: "error",
                });
              }
              $('#producto').DataTable().ajax.reload();
              $("#formRegistro").trigger('reset');
              $("#modalRegistro").modal("hide");
              $("#formRegistroProducto").trigger("reset");
            }
          })
          .fail(function(e)
          {
            swal({
              title: "Error",
              text: "Ocurrió un error al intentar registrar el producto: "+e.responseText,
              icon: "error",
            });
          })
        }
      }
    })
    .fail(function(e)
    {
      console.log("Ocurrió un error al intentar registrar el producto: "+e.responseText);
    })
  }
});

$("#formEditarProducto").submit(function(e)
{
  e.preventDefault();
  var id = $("#tituloModalEditar").text();
  var np = $("#nomProdEditar").val();
  var lc = $("#listCatEditar").val();
  var can = $("#cantidadEditar").val();
  var vn = $("#valorNetoEditar").val();
  var vv = $("#valorVenta").val();
  var ec = $("#estadoCatEditar").val();
  var ea = $("#esAcomEditar").val();
  var ta = $("#tieneAcomEditar").val();
  var cc = $("#comandaCocinaEditar").val();
  var cb = $("#comandaBarEditar").val();

  //hora
  let hora = getHora();
  $.ajax(
    {
      url:"editar_producto_exe.php?id="+id+"&nomProd="+np+"&cat="+lc+"&can="+can+"&vn="+vn+"&ec="+ep+"&ea="+ea+"&ta="+ta+"&cc="+cc+"&cb="+cb+"&hora="+hora,
      type: "GET",
      success: function(e)
      {
        if(e.match("correctamente"))
        {
          swal({
            title: "Excelente",
            text: e,
            icon: "success",
          });
        }
        if(e.match("No se puede desactivar"))
        {
          swal({
            title: "Aviso",
            text: e,
            icon: "warning",
          });
        }
        if(e.match("Error")||e.match("error"))
        {
          swal({
            title: "Error al modificar",
            text: e,
            icon: "error",
          });
        }
        $('#producto').DataTable().ajax.reload();
        $("#formRegistro").trigger('reset');
        $("#modalEditar").modal("hide");
      }
    })
    .fail(function(e)
    {
      console.log(e.responseText);
    })
});

function getHora()
{
  var hoy = new Date();
  var h = hoy.getHours();
  var min = hoy.getMinutes();
  var sec = hoy.getSeconds();
  if(hora<10)
  {
    h = '0'+h;
  }
  if(min<10)
  {
    min = '0'+min;
  }
  if(sec<10)
  {
    sec = '0'+sec;
  }
  var hora = h+":"+min+":"+sec;
  return hora;
}
