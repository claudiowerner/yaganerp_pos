//Datatable
var idCat = 0;
table = $('#planes').DataTable({
    "createdRow": function(row, data, dataIndex){
    },
    "ajax":{
        "url":"php/planes/read_planes.php",
        "type":"GET",
        "dataSrc":""
    },
    //columnas
    "columns":[
        {"data":"numero_fila"},
        {"data":"nombre"},
        {"data":"usuarios"},
        {"data":"cajas"},
        {"data": "valor", render: $.fn.dataTable.render.number( '.', '.', 0, '$', '' )},
        {
            "data" : null,
            "render": function (data, type, row, meta) {
                let id = data.id;
                let nombre = data.nombre;
                let usuarios = data.usuarios;
                let cajas = data.cajas;
                let valor = data.valor; 
                return `<button type="submit" class="btn btn-primary editar" id="btnEditar" onclick="modalEditarPlan(${id}, '${nombre}', ${usuarios}, ${cajas}, ${valor})"><i class='fa fa-edit' aria-hidden='true'></i></button>
                <button type="submit" class="btn btn-danger" id="btnEliminar" onclick="eliminarPlan(${id}, '${nombre}')"><i class='fa fa-trash-o' aria-hidden='true'></i></button>`
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

