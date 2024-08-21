
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






function cargarArchivosComprobantes(idCliente)
{
    table.destroy();
    table = $('#tablaComprobantes').DataTable({
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
            {"data":"nombre_archivo"},
            {"data":"fecha_carga"},
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

//Acciones al clickear una fila de la tabla
$("#tablaComprobantes").on('click', 'tr', function(e)
{
    let comprobantes = $("#tablaComprobantes").DataTable();
    var datos = comprobantes.row(this).data();

    let id = datos.id;
    let url = datos.dir_archivo;
    abrirComprobantePago(id, url);
});