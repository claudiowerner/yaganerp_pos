var table;

      //Datatable
      var idCat = 0;
      table = $('#producto').DataTable({
        "createdRow": function( row, data, dataIndex){
        },

          "ajax":{
            "url":"funciones/read_clientes.php",
            "type":"GET",
            "dataSrc":""
          },
          //columnas
          "columns":[
            {"data":"item"},
            {"data":"rut"},
            {"data":"nombre"},
            {"data":"apellido"},
            {"data":"nombre_usuario"},
            {"data":"fecha_registro"},
            {
                "data": null,
                "bSortable": false,
                "mRender": function(data, type, value) {

                  //habilitar o deshabilitar botón VerCuentas si el total de cuentas del cliente es mayor a 0
                  let disabled;

                  //se agregará "disabled" a la etiqueta del botón en caso de cumplirse la condición
                  if(value.total_cuentas>0)
                  {
                    disabled = "";
                  }
                  else
                  {
                    disabled = "disabled";
                  }
                  return `<button type="submit" id="btnEditar" class="btn btn-primary" onClick="editarCliente('${value.id}','${value.rut}','${value.nombre}','${value.apellido}')" ><i class='fa fa-edit' aria-hidden='true'></i></button>
                  <button type="submit" id="btnVerCuentas" class="btn btn-success" onClick=verCuentas('${value.rut}') ${disabled}><i class='fa fa-folder-open' aria-hidden='true'></i>(${value.total_cuentas})</button>
                  <button type="submit" id="btnEliminar" class="btn btn-danger" onClick="eliminarCliente('${value.rut}','${value.nombre}','${value.total_cuentas}')"><i class='fa fa-trash-o' aria-hidden='true'></i></button>`;
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


