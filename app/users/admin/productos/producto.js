ep = "S"; //almacena el estado del piso
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
          {"data":"codigo_barra"},
          {"data":"nombre_prod"},
          {"data":"nombre_cat"},
          {"data":"cantidad"},
          {"data":"valor_neto"},
          {"data":"valor_venta"},
          {"data":"estado"},
          {"data":"creado_por"},
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
        })
      }
    }
  })
  .fail(function (r)
  {
    console.log("fail ajax producto: "+e.responseText);
  })

  //eliminar signo $ de los valores
  let vn = datos.valor_neto;
  let vt = datos.valor_venta;
  let valor_neto = vn.slice(1);
  let valor_venta = vt.slice(1);

  $("#nomProdEditar").val(datos.nombre_prod);
  $("#codBarraEditar").val(datos.codigo_barra);
  $("#valorNetoEditar").val(valor_neto);
  $("#valorVentaEditar").val(valor_venta);
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
  var cb = $("#codBarra").val();

  if(lc=="O"||cb=="O")
  {
    if(lc=="O")
    {
      $("#errCategoria").html("Debe seleccionar una categoría válida.");
    }
    if(lc!="O")
    {
      $("#errCategoria").html("");
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
              url:"crear_producto_exe.php?nomProd="+np+"&cat="+lc+"&can="+can+"&vn="+vn+"&vv="+vv+"&cod_barra="+cb,
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
  var cod_barra = $("#codBarraEditar").val();
  var lc = $("#listCatEditar").val();
  var can = $("#cantidadEditar").val();
  var vn = $("#valorNetoEditar").val();
  var vv = $("#valorVentaEditar").val();

  //hora
  let hora = getHora();
  $.ajax(
    {
      url:"editar_producto_exe.php?codigo_barra="+cod_barra+"&id="+id+"&nomProd="+np+"&cat="+lc+"&can="+can+"&vv="+vv+"&vn="+vn+"&estado="+ep+"&hora="+hora,
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
