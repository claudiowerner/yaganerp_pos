

table = $('#temporadas').DataTable({
	"createdRow": function( row, data, dataIndex){},
	"ajax":{
		"url":"script_php/leer/leer_temporadas.php",
		"type":"GET",
		"dataSrc":""
	},
	//columnas
	"columns":[
		{"data":"num_item"},
		{"data":"nombre_temporada"},
		{"data":"fecha"},
		{"data":"fecha_cierre"},
		{"data":"creado_por"},
		{
			'data' : null,
			'render': function (data, type, row, meta) {
				let btnEditar = `<button class="btn btn-primary" onClick="abrirModalEditar(${data.id}, '${data.nombre_temporada}')"><i class='fa-solid fa-edit' aria-hidden='true'></i></button>`;
				let btnCerrar = `<button class='btn btn-success' onClick="cerrarTemporada(${data.id}, '${data.nombre_temporada}')"><i class="fa-solid fa-lock"></i></button>`;
				let btnEliminar = `<button class='btn btn-danger' onClick="eliminarTemporada(${data.id}, '${data.nombre_temporada}')"><i class='fa-solid fa-trash' aria-hidden='true'></i></button>`;
				let btnExpandir = `<button class='btn btn-primary' onClick="expandirDatosTemporada(${data.id},'${data.nombre_temporada}')"><i class='fa-solid fa-expand' aria-hidden='true'></i></button>`;
				if(data.estado == "C")
				{
					btnCerrar = `<button id='btnEliminar' class='btn btn-success' disabled><i class="fa-solid fa-lock"></i></button>`;
					btnEditar = `<button type="submit" id="btnEditar" class="btn btn-primary" disabled><i class='fa-solid fa-edit' aria-hidden='true'></i></button>`;
				}

				return btnEditar+btnCerrar+btnEliminar+btnExpandir;
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