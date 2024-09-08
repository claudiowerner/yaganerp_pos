//Datatable
var idCat = 0;
table = $('#planes').DataTable({
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
    "url":"php/planes/read_planes.php",
    "type":"GET",
    "dataSrc":""
  },
  //columnas
  "columns":[
    {"data":"id"},
    {"data":"nombre"},
    {"data":"estado"},
    {"data":"usuarios"},
    {"data":"cajas"},
    {"data":"valor"},
    {
        "defaultContent": '<button type="submit" class="btn btn-primary editar" id="btnEditar"><img src="../img/edit.png" width="15"></button>'
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

