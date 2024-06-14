var table;

      //Datatable
      var idCat = 0;
      table = $('#producto').DataTable({
        "createdRow": function( row, data, dataIndex){
          if( data.estado ==  `ACTIVO`){
            $(row).addClass('ACTIVO');
          }
          else
          {
            $(row).addClass('INACTIVO');
          }
        },

          "ajax":{
            "url":"read_clientes.php",
            "type":"GET",
            "dataSrc":""
          },
          //columnas
          "columns":[
            {"data":"id"},
            {"data":"rut", "type": "String"},
            {"data":"nombre"},
            {"data":"apellido"},
            {"data":"estado"},
            {"data":"nombre_usuario"},
            {"data":"fecha_registro"},
            {
                "data": null,
                "bSortable": false,
                "mRender": function(data, type, value) {
                    return `<button type="submit" id="btnEditar" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar" ><img src="../img/edit.png" width="15"></button>
                    <button type="submit" id="btnVerCuentas" class="btn btn-success" onClick=btnVerCuentas(`+value.rut+`)>Ver cuentas</button>`;
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


