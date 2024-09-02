
/* ------------------------------------------- FUNCION AJAX -------------------------------------------- */
function cargarArchivosComprobantesAjax(idCliente)
{
    return $.ajax({
        url: "php/cliente/comprobante/read_comprobantes_tabla.php",
        type: "POST",
        data: {"id_cl": idCliente},
        async: false
    }).responseText;
}


/* ------------------------------------------- FUNCION DOM --------------------------------------------- */






function cargarArchivosComprobantes(idCliente, tablaComprobantes)
{
    //destrucción de la datatable si es que ya se ha inicializado
    if ( $.fn.DataTable.isDataTable('#tablaComprobantes')) 
    {
        $('#tablaComprobantes').DataTable().destroy();
    }
    tablaComprobantes = $('#tablaComprobantes').DataTable({
        "createdRow": function( row, data, dataIndex){
        },
        "ajax":{
          "url":"php/cliente/comprobante/read_comprobantes_tabla.php",
          "data": {"id_cl":idCliente},
          "type":"POST",
          "dataSrc":""
        },
        //<td>${j.fecha_carga}</td>
        //columnas
        "columns":[
            {"data":"id"},
            {"data":"periodo"},
            {
                'data' : null,
                'render': function (data, type, row, meta) {
                    let nombre = data.nombre_archivo;
                    let url = data.dir_archivo;
                    let id_pago = data.id_pago;
                    return `<button class="btn btn-primary" onclick="abrirComprobantePago(${id_pago},'${url}')"><i class='fa fa-folder-open-o' aria-hidden='true'></i> ${nombre}</button>`;
                }
            },
            {"data":"fecha_carga"},
            {
                'data' : null,
                'render': function (data, type, row, meta) {
                    return `<button class="btn btn-primary" onclick="editarPeriodo(${data.id_pago})"><i class='fa fa-edit' aria-hidden='true'></i></button>`;
                }
            },
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
