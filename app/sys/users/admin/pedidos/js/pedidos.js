ec = ""; //almacena el estado del piso
$("#swEditarCategoria").on("click", function(e)
{
  if(e.target.checked)
  {
    ec = "S";
  }
  else
  {
    ec = "N";
  }
})
var table;


  //Datatable
  datosTabla = "";
  table = $('#pedidos').DataTable({
    "createdRow": function( row, data, dataIndex){
      if( data.estado ==  `HECHO`){
        $(row).addClass('ACTIVO');
      }
      else
      {
        $(row).addClass('INACTIVO');
      }
    },
    "columnDefs": [
      {
          "targets": 5, // Índice de la columna que deseas formatear
          "render": function (data, type, row, meta) {
              // Formatear el número en miles y en moneda
              return new Intl.NumberFormat('es-CL', { style: 'currency', currency: 'CLP' }).format(data);
          }
      }],

      "ajax":{
        "url":"funciones/pedido/read/read_pedidos.php",
        "type":"GET",
        "dataSrc":""
      },
      //columnas
      "columns":[
        {"data":"id"},
        {"data":"nombre_proveedor"},
        {"data":"estado"},
        {"data":"nombre"},
        {"data":"fecha_registro"},
        {"data":"valor"},
        {"data":"estado_pago"},
        {
          "defaultContent": '<button type="submit" id="btnEditar" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar" ><img src="../img/edit.png" width="15"></button>'
        },
        {
          "data": null,
          "render": function (data, type, row) {
            return "<button type='submit' id='btnImprimir' data-id='"+data.id+"' class='btn btn-primary'><img src='../img/impresora.png' width='15'></button>";
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

  
$("#pedidos").on('click', 'tr', function(e)
{
  e.preventDefault();
  var cat = $('#pedidos').DataTable();
  var datos = cat.row(this).data();
  let id = datos.id;
  $("#idModal").html(id);


  //cargar ID del proveedor para preseleccionar dicha opción
  $.ajax({
    url:"funciones/read_id_proveedor.php",
    data: {"id_pedido": id},
    type: "POST",
    success: function(e)
    {
      $("#slctProveedorEditar").select(e);
    }
  })
  .fail(function(e)
  {
    msjes_swal("Error",e,"error");
  })
  
  cargarEstadoPedido(id);
  cargarEstadoPagoPedido(id);
  cargarFacturaConIva(id);
  cargarPedido();
})

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