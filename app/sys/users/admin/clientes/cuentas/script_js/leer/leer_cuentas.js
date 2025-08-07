function cargar_dataTable()
{
    
    let rut = $("#rut").text()
    var table;
    //Datatable
    var idCat = 0;
    table = $('#producto').DataTable({
        "createdRow": function( row, data, dataIndex){},
        "ajax":{
            "url":"script_php/read_cuentas.php?rut="+rut,
            "type":"GET",
            "dataSrc":""
        },
        //columnas
        "columns":[
            {"data":"correlativo"},
            {"data": null,
                "bSortable": false,
                "mRender": function(data, type, value) {
                    let boton;

                    if(data.estado == "A")
                    {
                        boton = "<button class='btn btn-danger' width='100%' disabled>POR PAGAR</button>";
                    }
                    if(data.estado == "C")
                    {
                        boton = "<button class='btn btn-succes' width='100%' disabled>PAGADO</button>";
                    }
                    return boton;
                }
            },
            {"data":"fecha"},
            {"data": null,
                "bSortable": false,
                "mRender": function(data, type, value) {
                    return formatearNumero("P", data.valor)
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