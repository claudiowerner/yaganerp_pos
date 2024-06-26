


let table = "";

//acción consultar productos
$("#btnConsultarProductos").on("click", function()
{
    $("#modalProducto").modal("show");
    cargarDataTable();
});


//cargar datatable
function cargarDataTable()
{
    /*------------------------------------------DATATABLE----------------------------------------- */
    var boton = 0;
    table = $("#tblProducto").DataTable({
        "createdRow": function( row, data, dataIndex){
            
        },
        "ajax":{
            "url":"func_php/producto/buscar_producto.php",
            "type":"GET",
            "dataSrc":""
        },
        "bDestroy": true,
        
        //columnas
        "columns":[
            {"data":"codigo_barra"},
            {"data":"nombre_cat"},
            {"data":"nombre_prod"},
            {"data":"cantidad"},
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