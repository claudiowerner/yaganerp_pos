//SELECCIONAR PESTAÑA AL CARGAR LA PÁGINA
$('a[href="#productos"]').click();

$("#slctProveedorProductoEditar").select2();     
$("#listCatEditar").select2();


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


rp = "N"; //almacena el estado de que si el producto requiere pesaje o no
$("#swPesaje").on("click", function(e)
{
  html = "";
  if(e.target.checked)
  {
    rp = "S";
    html = "Valor neto por KG.";
    $("#pesaje").show();
    $("#codigoBarra").attr("required", false);
    $("#codigoBarra").prop("disabled", true);
    $("#codigoBarra").attr("placeholder", "Campo no necesario");
  }
  else
  {
    rp = "N";
    html = "Valor neto";
    $("#pesaje").hide();
    $("#codigoBarra").attr("required", true);
    $("#codigoBarra").prop("disabled", false);
    $("#codigoBarra").attr("placeholder", "");
  }
  $("#lblValorNeto").html(html);
})

rpEditar = "N"; //almacena el estado de que si el producto a editar requiere pesaje o no
$("#swPesajeEditar").on("click", function(e)
{
  enabled = true;
  if(e.target.checked)
  {
    rpEditar = "S";
    enabled = true;
    $("#pesajeEditar").show();
    $("#codBarraEditar").attr("required", true);
    $("#codBarraEditar").attr("placeholder", "");
  }
  else
  {
    rpEditar = "N";
    enabled = false;
    $("#pesajeEditar").hide();
    $("#codBarraEditar").attr("required", false);
    $("#codBarraEditar").attr("placeholder", "");
  }
})

var table;

//cargar estado de trabajo con o sin stock (activado o desactivado)
$.ajax({
  url:"productos/productos/read_config_productos.php",
  type: "POST",
  success: function(e)
  {
    if(e.match("S"))
    {
      $("#cantidadProd").attr("disabled", false);
      $("#txtCantidadEditar").attr("disabled", false);
    }
    else
    {
      $("#cantidadProd").attr("disabled", true);
      $("#txtCantidadEditar").attr("disabled", true);
      $("#cantidadProd").val("Stock desactivado");
    }
  }
})

    //Datatable
    var idCat = 0;
    table = $('#producto').DataTable({
      "createdRow": function( row, data, dataIndex){
      },

        "ajax":{
          "url":"funciones/read_productos.php",
          "type":"GET",
          "dataSrc":""
        },
        
        //columnas
        "columns":[
          {"data":"codigo_barra"},
          {"data":"nombre_prod"},
          {"data":"nombre_proveedor"},
          {"data":"nombre_cat"},
          {"data":"cantidad"},
          {"data":"valor_venta", render: DataTable.render.number(null, null, "", "$", "") },
          {
            'data' : null,
            'render': function (data, type, row, meta) {
              console.log(data);
              let pesaje =  data.pesaje;
              let id =  data.id;
              let codigo_barra =  data.codigo_barra;
              let nombre_prod =  data.nombre_prod;
              let id_proveedor =  data.id_proveedor;
              let id_categoria =  data.id_categoria;
              let cantidad =  data.cantidad;
              let valor_neto =  data.valor_neto;
              let margen_ganancia =  data.margen_ganancia;
              let monto_ganancia =  data.monto_ganancia;
              let valor_venta =  data.valor_venta;
              let descuento =  data.descuento;
              let creado_por =  data.creado_por;
              let fecha_reg =  data.fecha_reg;
              return `
              <button id='btnAbrirDetalles' class='btn btn-success' onClick="abrirDetalles(${pesaje},'${id}','${codigo_barra}','${nombre_prod}', '${data.nombre_cat}', '${data.nombre_proveedor}', '${cantidad}', '${valor_neto}', '${margen_ganancia}', '${monto_ganancia}','${valor_venta}','${descuento}', '${creado_por}', '${fecha_reg}')"><i class='fa fa-expand' aria-hidden='true'></i></button>
              <button type="submit" id="btnEditar" class="btn btn-primary" onClick="abrirModalEditar(${pesaje},'${id}','${codigo_barra}','${nombre_prod}', '${id_categoria}', '${id_proveedor}', '${cantidad}', '${valor_neto}', '${margen_ganancia}', '${monto_ganancia}','${valor_venta}','${descuento}', '${creado_por}', '${fecha_reg}')"><i class='fa fa-edit' aria-hidden='true'></i></button>
              <button id='btnEliminar' class='btn btn-danger' onClick="eliminarProducto(${data.id}, '${nombre_prod}')"><i class='fa fa-trash-o' aria-hidden='true'></i></button>`;
            }
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

function getFechaBD()
{
  var hoy = new Date();
  //fecha
  let dia = hoy.getDate();
  let mes = parseInt(hoy.getMonth())+parseInt(1);
  let ano = hoy.getFullYear();
  if(dia<10)
  {
    dia = "0"+hoy.getDate();
  }
  if(mes<10)
  {
    mes = "0"+mes;
  }
  var fecha = ano+"-"+mes+"-"+dia;
  return fecha;
}
