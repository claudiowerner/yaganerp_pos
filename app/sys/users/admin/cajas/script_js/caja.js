

  cargarCajasActivas();
  cargarCajasPermitidas();
  validarCajasActivas();
  $("#btnAgregarCaja").on("click", function(e)
  {
    $("#modalRegistro").modal("show");
  })

  ep = ""; //almacena el estado del piso
  $("#swEditarPiso").on("click", function(e)
  {
    if(e.target.checked)
    {
      ep = "S";
    }
    else
    {
      ep = "N";
    }
  })
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
            "url":"script_php/read_caja.php",
            "type":"GET",
            "dataSrc":""
          },
          //columnas
          "columns":[
            {"data":"id"},
            {"data":"nombre"},
            {"data":"creado_por"},
            {"data":"fecha_reg"},
            {
              "data": null,
              "render": function (data, type, row) {
                return `<button type='submit' id='btnEditar' class='btn btn-primary' onClick='abrirModalEditar(${data.id},"${data.nombre}")'><i class='fa fa-edit' aria-hidden='true'></i></button>
                <button type='submit' id='btnEliminar' class='btn btn-danger' onClick='eliminarCaja(${data.id})'><i class='fa fa-trash-o' aria-hidden='true'></i></span></button>`;
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


