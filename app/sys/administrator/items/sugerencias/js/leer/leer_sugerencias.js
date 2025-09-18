
tabla_sugerencias = $("#tab_sugerencia").DataTable({
    "createdRow": function(row, data, dataIndex){
    },
    "ajax":{
        "url":"php/sugerencias/leer/leer_sugerencias.php",
        "type":"GET",
        "dataSrc":""
    },
    //columnas
    "columns":[
        {"data":"id"},
        {"data":"nombre"},
        {
            "data": null,
            "render": function (data, type, row, meta)
            {
                let retorno = "";
                if(data.estado=="A")
                {
                    retorno = "<button class='btn btn-primary' disabled>POR LEER</button>"
                }
                else
                {
                    retorno = "<button class='btn btn-secondary' disabled>LEÍDO</button>";
                }
                return retorno;
            }
        },
        {"data": "fecha_sugerencia"},
        {
            "data" : null,
            "render": function (data, type, row, meta) {
                return `
                <button type="submit" class="btn btn-primary editar" id="btnEditar" onclick="abrirModalSugerencia(${data.id},'${data.nombre}', '${data.sugerencia}')"><i class='fa fa-expand' aria-hidden='true'></i></button>
                <button type="submit" class="btn btn-danger" id="btnEliminar" onclick="eliminarSugerencia(${data.id})"><i class='fa fa-trash-o' aria-hidden='true'></i></button>`
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

