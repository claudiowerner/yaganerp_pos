//SELECCIONAR PESTAÑA AL CARGAR LA PÁGINA
$('a[href="#productos"]').click();


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
        if( data.estado ==  `ACTIVO`){
          $(row).addClass('ACTIVO');
        }
        else
        {
          $(row).addClass('INACTIVO');
        }
      },

        "ajax":{
          "url":"funciones/read_productos.php",
          "type":"GET",
          "dataSrc":""
        },
        
        //columnas
        "columns":[
          {"data":"id"},
          {"data":"codigo_barra"},
          {"data":"nombre_prod"},
          {"data":"nombre_proveedor"},
          {"data":"nombre_cat"},
          {"data":"cantidad"},
          {"data":"valor_neto", render: DataTable.render.number(null, null, "", "$", "") },
          {"data":"margen_ganancia"},
          {"data":"monto_ganancia", render: DataTable.render.number(null, null, "", "$", "") },
          {"data":"valor_venta", render: DataTable.render.number(null, null, "", "$", "") },
          {"data":"descuento"},
          {"data":"creado_por"},
          {"data":"fecha_reg"},
          {
            'data' : null,
            'render': function (data, type, row, meta) {
            var arr = table
              .column()
              .data()
              .toArray();
              return `<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar" id="btnEditar"><i class='fa fa-edit' aria-hidden='true'></i></button>
              <button id='btnEliminar' class='btn btn-danger' onClick="eliminarProducto(${data.id}, '${data.nombre_cat}')"><i class='fa fa-trash-o' aria-hidden='true'></i></button>`;
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


$("#producto").on('click', 'tr', function(e)
{
  console.log(e)
  e.preventDefault();
  var cat = $('#producto').DataTable();
  var datos = cat.row(this).data();
  let id = datos.id;
  

  cargarUnidadEspecifica(id);
  obtenerID(datos.nombre_cat);
  abrirProductoEspecifico(id);

  //eliminar signo $ de los valores
  let vn = datos.valor_neto;
  let vt = datos.valor_venta;
  let mg = datos.monto_ganancia;
  let valor_neto = vn.slice(1);
  let valor_venta = vt.slice(1);
  let monto_ganancia = mg.slice(1);
  let porc = datos.margen_ganancia;
  let porcentaje = porc.slice(0, porc.length - 1);

  
  let porcDescto = datos.descuento;//variable que captura el % de descuento indicado en la tabla 
  let txtDescto = porcDescto.slice(0, porcDescto.length - 1);//valor que se pondrá en el txtDescuento para ser editado

  $("#nomProdEditar").val(datos.nombre_prod);
  $("#txtCodBarraEditar").val(datos.codigo_barra);
  $("#margenGananciaEditar").val(porcentaje);
  $("#valorNetoEditar").val(valor_neto);
  $("#montoGananciaEditar").val(monto_ganancia);
  $("#valorVentaEditar").val(valor_venta);
  $("#txtCantidadEditar").val(datos.cantidad);
  $("#porcDesctoEditar").val(txtDescto);
  
  $("#tituloModalEditar").html(datos.id);

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
