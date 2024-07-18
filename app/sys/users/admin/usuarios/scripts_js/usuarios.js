table = $('#producto').DataTable({
  "ajax":{
    "url":"scripts/read_usuarios.php",
    "type":"GET",
    "dataSrc":""
    },
    //columnas
    "columns":[
      {"data":"item"},
      {"data":"nombre"},
      {"data":"user"},
      {"data":"tipo_usuario"},
      {"data":"permisos"},
      {"data":"fecha_reg"},
      {
        "data": null,
          "render": function (data, type, row) {
            return `<button type='submit' id='btnEditar' class='btn btn-primary' onClick="abrirModalEditarUsuario('${data.id}','${data.nombre}', '${data.user}', '${data.id_tipo_usuario}', '${data.permisos_separados}')"><i class='fa fa-edit' aria-hidden='true'></i></button>
            <button type='submit' id='btnEliminar' class='btn btn-danger' onClick="eliminarUsuario(${data.id})"><i class='fa fa-trash-o' aria-hidden='true'></i></span></button>`;
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
  }
);

