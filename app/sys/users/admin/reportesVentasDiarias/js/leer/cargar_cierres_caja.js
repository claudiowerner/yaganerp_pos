function leer_cierres_caja(id)
{
    if(DataTable.isDataTable("#cierreCaja"))
	{
		$("#cierreCaja").DataTable().destroy();	
	}

	$.ajax({
		url:"php/leer/read_cierre_caja.php",
		type:"POST",
		data: {"id_temp": id},
		success: function(e)
		{
            let json = JSON.parse(e);
            $('#cierreCaja').DataTable({
				data: json,
				language: {
					url: 'datatables.net/datatables.net-plugins/i18n/es-ES.mjs',
				},
				//columnas
				columns:[
                    {data: "num_fila"},
                    {data:"nombre"},
                    {data:"creado_por"},
                    {data:"desde"},
                    {data:"hasta"},
                    {data:null,
                        render: function(data, type, row, meta)
                        {
                            let retorno = "";
                            if(data.estado=="A")
                            {
                                retorno = "CAJA ABIERTA";
                            }
                            else
                            {
                                retorno = "CAJA CERRADA";
                            }
                            return retorno;
                        }
                    },
                    {data: "valor_total", render: DataTable.render.number(null, null, "", "$", "") },
                    {data : null,
                        render: function (data, type, row, meta) {
                            let bt_cerrar = "";
                            let bt_editar = "";
                            let bt_ir = "";
                            if(data.estado == "C")
                            {
                                bt_cerrar = `<button type='button' class='btn btn-danger' style='margin: 2px' disabled=true id='btnCerrar'>Cerrar</button>`;
                                bt_editar = `<button type='button' class='btn btn-primary' style='margin: 2px' disabled=true>Editar</button>`;
                            }
                            else
                            {
                                bt_cerrar = `<button type='button' class='btn btn-danger' style='margin: 2px' id='btnCerrar' onclick="cerrarCaja(${data.id}, '${data.nombre}')">Cerrar</button>`;
                                bt_editar = `<button type='button' style='margin: 2px' class='btn btn-primary' idCierre='${data.id}' nomCaja='${data.nombre}'>Editar</button>`;
                            }
                            bt_ir = `<button type='button' style='margin: 2px' class='btn btn-success' id='btnVerDetalle' onclick='abrirDesglose(${data.id}, "${data.nombre}")'>Ir</button>`
                            let boton = bt_cerrar+bt_editar+bt_ir;
                            return boton;
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
}