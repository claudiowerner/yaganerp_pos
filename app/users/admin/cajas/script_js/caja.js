
$(document).on("ready", function(e)
{
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
            {"data":"estado"},
            {"data":"creado_por"},
            {"data":"fecha_reg"},
            {
                "defaultContent": '<button type="submit" class="btn btn-primary editar" id="btnEditar"><img src="../img/edit.png" width="15"></button>'
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

  $("#producto").on("click", "tr", function(e)
  {
    e.preventDefault();
    var cat = $("#producto").DataTable();
    var datos = cat.row(this).data();
    var estado = "";
    $("#modalEditar").modal('show'); 
    $("#idPiso").html(datos.id);
    $("#nomPisoEditar").val(datos.nombre);
    
    if(datos.estado == "ACTIVO")
    {
      $("#swEditarPiso").prop("checked", true);
      ep = "S";
    }
    else
    {
      $("#swEditarPiso").prop("checked", false);
      ep = "N";
    }
  });

  $("#btnGuardar").on("click", function(e)
  {
    let nombre = $("#nomPiso").val();
    if(nombre!="")
    {
      let fecha = getFecha();
      e.preventDefault();
      $.ajax({
        url:"script_php/crear_caja.php?nomCaja="+nombre+"&fecha="+fecha,
        type: "POST",
        success: function(e)
        {
          $("#errNomPiso").html("");
          if(e.match("correctamente"))
          {
            msjes_swal("Excelente", e, "success");
            cargarCajasActivas();
          }
          if(e.match("Error")||e.match("error"))
          {
            msjes_swal("Error al crear caja", e, "error");
          }
          $('#producto').DataTable().ajax.reload();
          $("#modalRegistro").modal("hide");
        }
      })
      .fail(function(e)
      {
        console.log(e.responseText);
      })
    }
    else
    {
      
      $("#errNomPiso").html("Debe rellenar este campo");
    }

  });

  $("#btnModificar").on("click", function(e)
  {
    let nombre = $("#nomPisoEditar").val();
    let idCaja = $("#idPiso").text();
    let datos = {
      "nomCaja": nombre,
      "estado": ep,
      "idCaja": idCaja
    }
    if(nombre!="")
    {
      if(ep=="S")
      {
        modificar(datos);
      }
      if(ep=="N")
      {
        modificar(datos);
      }
      $("#errNomPisoEditar").html("");
      
      e.preventDefault();
    }
    else
    {
      $("#errNomPisoEditar").html("Debe rellenar este campo");
    }
  });
})

function modificar(datos)
{
  $.ajax({
    url:"script_php/editar_caja.php",
    data:datos,
    type: "POST",
    success: function(e)
    {
      if(e.match("correctamente"))
      {
        msjes_swal("Excelente", e, "success");
      }
      if(e.match("No se puede desactivar la caja porque existen ventas activas asociadas"))
      {
        msjes_swal("Aviso", e, "warning");
      }
      if(e.match("Error")||e.match("error"))
      {
        msjes_swal("Error al modificar", e, "error");
      }
      $('#producto').DataTable().ajax.reload();
      $("#modalEditar").modal("hide");
      cargarCajasActivas();
      validarCajasActivas();
    }
  })
  .fail(function(e)
  {
    console.log(e.responseText);
  })
}

function getFecha ()
{
  var hoy = new Date();
  //fecha
  let dia = hoy.getDate();
  let mes = hoy.getMonth()+1;
  let ano = hoy.getFullYear();

  if(dia<10)
  {
    dia = "0"+hoy.getDate();
  }
  if(mes<10)
  {
    mes = "0"+hoy.getMonth();
  }
  var fecha = ano+"-"+mes+"-"+dia;
  return fecha;
}
