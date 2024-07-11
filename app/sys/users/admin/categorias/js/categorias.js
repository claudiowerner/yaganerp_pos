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
  table = $('#categoria').DataTable({
    "createdRow": function( row, data, dataIndex){
    },

      "ajax":{
        "url":"php/read_categorias.php",
        "type":"GET",
        "dataSrc":""
      },
      //columnas
      "columns":[
        {"data":"item"},
        {"data":"nombre_cat"},
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
            <button id='btnEliminar' class='btn btn-danger' onClick="eliminarCategoria(${data.id}, '${data.nombre_cat}')"><i class='fa fa-trash-o' aria-hidden='true'></i></button>`;
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