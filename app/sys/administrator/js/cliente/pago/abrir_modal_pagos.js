
function abrirModalPagos(id)
{
    $("#idClientePago").html(id);
    $("#modalPagos").modal("show");

    //destrucción de la datatable si es que ya se ha inicializado
    if ( $.fn.DataTable.isDataTable('#tablaPagos')) 
    {
        $('#tablaPagos').DataTable().destroy();
    }

    
    tablaPagos = $('#tablaPagos').DataTable({
        "createdRow": function( row, data, dataIndex){
        },
        "ajax":{
          "url":"php/cliente/pagos/read_pagos.php",
          "data": {"id_cl": id},
          "type":"POST",
          "dataSrc":""
        },
        //<td>${j.fecha_carga}</td>
        //columnas
        "columns":[
            {"data":"numero_registro"},
            {"data":"fecha_desde"},
            {"data":"fecha_hasta"},
            {"data":"nombre"},
            {"data":"nombre_metodo_pago"},
            {
                "data":"valor",
                render: DataTable.render.number(null, null, "", "$", "")
            },
            {"data":"periodo_actual"},
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
    
}