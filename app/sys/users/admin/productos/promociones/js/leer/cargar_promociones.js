//Datatable
table = $('#tablaPromociones').DataTable({
	"createdRow": function( row, data, dataIndex){

	},
	"ajax":{
		"url":"promociones/funciones/leer/leer_promociones.php",
		"type":"POST",
		"dataSrc":""
	},
	//columnas
	"columns":[
        {"data":"id"},
        {"data":"nombre_promocion"},
        {"data":"unidades"},
        {"data":"nombre_prod"},
        {"data":"precio", render: DataTable.render.number(null, null, "", "$", "") },
        {"data":"nombre"},
        {"data":"fecha_registro"},
        {
            'data' : null,
            'render': function (data, type, row, meta) {
				return `
				<button type="submit" id="btnEditarPromocion" class="btn btn-primary" onClick="cargarPromocionSeleccionada(${data.id_promo})"><i class='fa fa-edit' aria-hidden='true'></i></button>
				<button id='btnEliminarPromocion' class='btn btn-danger' onClick="eliminarPromocion(${data.id_promo})"><i class='fa fa-trash' aria-hidden='true'></i></button>`;
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