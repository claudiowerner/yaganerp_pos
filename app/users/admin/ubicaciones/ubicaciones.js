eu = ""; //almacena el estado de la ubicacion seleccionada
$("#swEditarUbicacion").on("click", function(e)
{
  if(e.target.checked)
  {
    eu = "S";
  }
  else
  {
    eu = "N";
  }
})

var table;
cargarPiso();


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
          "url":"read_ubicaciones.php",
          "type":"GET",
          "dataSrc":""
        },
        //columnas
        "columns":[
          {"data":"id"},
          {"data":"ubicacion"},
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

function cargarPiso()
{
  $.ajax({

    url:"read_pisos.php",
    type: "POST",
    success: function(response)
    {
      let tasks = JSON.parse(response);
      let template = "";
      tasks.forEach(piso=>{
        template+=`<option value="${piso.id}">${piso.nombre}</option>`;
      });
      $("#slctPiso").html(template);
      $("#slctPisoEditar").html(template);
    }
  }).fail( function(e) {
      console.log( 'Error!!'+e.responseText );
  }).always( function() {
      console.log( 'Always piso' );
  });
}


$("#producto").on("click", "tr", function(e)
{
  e.preventDefault();
  var cat = $("#producto").DataTable();
  var datos = cat.row(this).data();

  if(datos.estado == "ACTIVO")
  {
    $("#swEditarUbicacion").prop("checked", true);
    eu = "S";
  }
  else
  {
    $("#swEditarUbicacion").prop("checked", false);
    eu = "N";
  }

  $("#modalEditar").modal('show'); 
  $("#idUbic").html(datos.id);
  $("#nomUbicacionEditar").val(datos.ubicacion);
  $("#slctEstadoEditar").val(datos.estado);
});

$("#btnGuardar").on("click", function(e)
{
  let nombre = $("#nomUbicacion").val();
  if(nombre!="")
  {
    $("#errNomUbic").html("");
    let slctPiso = $("#slctPiso").val();
    let fecha = getFecha();
    e.preventDefault();
    $.ajax({
      url:"crear_ubicacion.php?nomUbic="+nombre+"&piso="+slctPiso+"&fecha="+fecha,
      type: "POST",
      success: function(e)
      {
        if(e.match("correctamente"))
        {
          swal({
            title: "Excelente",
            text: e,
            icon: "success",
          });
        }
        if(e.match("error"))
        {
          swal({
            title: "Error",
            text: e,
            icon: "error",
          });
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
    $("#errNomUbic").html("Debe rellenar este campo");
  }
});

$("#btnModificar").on("click", function(e)
{
  let nombre = $("#nomUbicacionEditar").val();
  
  if(nombre!="")
  {
    $("#errNomUbicEditar").html("");
    let id = $("#idUbic").text();
    let piso = $("#slctPisoEditar").val();

    e.preventDefault();
    $.ajax({
      url:"editar_ubicacion.php?idUbic="+id+"&nom="+nombre+"&estado="+eu+"&piso="+piso,
      type: "POST",
      success: function(e)
      {
        if(e.match("correctamente"))
        {
          swal({
            title: "Excelente",
            text: e,
            icon: "success",
          });
        }
        if(e.match("No se puede desactivar la ubicación"))
        {
          swal({
            title: "Aviso",
            text: e,
            icon: "warning",
          });
        }
        if(e.match("Error")||e.match("error"))
        {
          swal({
            title: "Error",
            text: e,
            icon: "error",
          });
        }
        $("#modalEditar").modal("hide");
        $('#producto').DataTable().ajax.reload();
      }
    })
    .fail(function(e)
    {
      console.log(e.responseText);
    })
  }
  else
  {
    $("#errNomUbicEditar").html("Debe rellenar este campo");
  }
});

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
