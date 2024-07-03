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
          "data": null,
          "render": function (data, type, row) {
            return "<button type='submit' id='btnEditar' class='btn btn-primary' onClick='abrirModalEditar("+data.id+")'><img src='../img/edit.png' width='15'></button>";
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
