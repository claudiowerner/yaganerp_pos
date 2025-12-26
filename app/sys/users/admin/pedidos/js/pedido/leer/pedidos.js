function leer_pedidos(id)
{
	if(DataTable.isDataTable("#pedidos"))
	{
		$("#pedidos").DataTable().destroy();	
	}

	$.ajax({
		url:"funciones/pedido/read/pedido/read_pedidos.php",
		type:"POST",
		data: {"id_temp": id},
		success: function(e)
		{
			console.log(e);
			$('#pedidos').DataTable({
				data: e,
				language: {
					url: 'datatables.net/datatables.net-plugins/i18n/es-ES.mjs',
				},
				//columnas
				columns:[
					{data:"item"},
					{data:"nombre_pedido"},
					{data:"nombre_proveedor"},
					{data:"estado"},
					{data:"nombre"},
					{data:"fecha_registro"},
					{data:"valor", render: DataTable.render.number(null, null, "", "$", "")},
					{data:"estado_pago"},
					{
						data: null,
						render: function (data, type, row) {
							return "<button type='submit' id='btnEditar' class='btn btn-primary' onClick='abrirModalEditar("+data.id+")'><i class='fa fa-edit' aria-hidden='true'></i></button>"+
							"<button type='submit' id='btnEliminar' class='btn btn-danger' onClick='eliminarPedido("+data.id+")'><i class='fa fa-trash' aria-hidden='true'></i></span></button>";
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
					"lengthMenu": "Mostrar _MENU_ registros",
					"infoFiltered": "(filtrado de un total de _MAX_ registros)",
						"search":"Buscar",
						"oPaginate":{
							"sFirst":"Primero",
							"sLast":"Último",
							"sNext":"Siguiente",
							"sPrevious":"Anterior"
						}
					}
				}
			);
		}
	})
	.fail(function(e){
		console.log(e.responseText);
	})

	/**/
}