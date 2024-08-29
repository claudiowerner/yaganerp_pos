
function abrirTablaPagos(id)
{
    $("#idClientePago").html(id);
    $("#modalTablaPagos").modal("show");

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
            {
                'data' : null,
                'render': function (data, type, row, meta) {
                    let disabled = "";
                    
                    let id_plan = data.id_plan;
                    let id_metodo = data.id_metodo;
                    let plazo_pago = data.plazo_pago;
                    if(data.estado_pago=='S')
                    {
                        disabled = "disabled";
                    }
                    else
                    {
                        disabled = "";
                    }
                    return `<button class='btn btn-primary' onclick='abrirModalEditarPago(${data.id}, ${data.id_cl}, ${id_plan}, ${id_metodo}, ${plazo_pago})'><i class='fa fa-edit' aria-hidden='true'></i></button>
                    <button class='btn btn-success' onclick='pagarPeriodo(${data.id})' ${disabled}><i class='fa fa-dollar' aria-hidden='true'></i></button>`;
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
    
}