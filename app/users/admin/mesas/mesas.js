em = ""; //almacena el estado del piso
$("#swEditarMesa").on("click", function(e)
{
  if(e.target.checked)
  {
    em = "S";
  }
  else
  {
    em = "N";
  }
})
var table;
cargarUbicacion();


    //Datatable
    var idCat = 0;
    table = $('#mesas').DataTable({
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
          "url":"read_mesas.php",
          "type":"GET",
          "dataSrc":""
        },
        //columnas
        "columns":[
          {"data":"id"},
          {"data":"num_mesa"},
          {"data":"nom_mesa"},
          {"data":"ubicacion"},
          {"data":"estado"},
          {"data":"nom_us"},
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


function cargarUbicacion()
{
  $.ajax({

    url:"read_ubicaciones.php",
    type: "POST",
    success: function(response)
    {
      let tasks = JSON.parse(response);
      let template = "";
      tasks.forEach(piso=>{
        template+=`<option value="${piso.id}">${piso.nombre}</option>`;
      });
      $("#slctUbicacion").html(template);
      $("#slctUbicacionEditar").html(template);
    }
  }).fail( function(e) {
      console.log( 'Error!!'+e.responseText );
  }).always( function() {
      console.log( 'Always piso' );
  });
}


$("#mesas").on("click", "tr", function(e)
{
  e.preventDefault();
  var cat = $("#mesas").DataTable();
  var datos = cat.row(this).data();
  
  if(datos.estado == "ACTIVO")
  {
    $("#swEditarMesa").prop("checked", true);
    em = "S";
  }
  else
  {
    $("#swEditarMesa").prop("checked", false);
    em = "N";
  }

  $("#modalEditar").modal('show'); 
  $("#idMesa").html(datos.id);
  $("#numMesaEditar").val(datos.num_mesa);
  $("#nomMesaEditar").val(datos.nom_mesa);
});

$("#btnAgregarMesa").on("click", function(e)
{
  $("#modalRegistro").modal("show");
  let ubicacion = $("#slctUbicacion").val();
  obtenerNumMesa(ubicacion);
})

$("#btnGuardar").on("click", function(e)
{
  let numMesa = $("#numMesa").text();
  let nombre = $("#nomMesa").val();
  let ubic = $("#slctUbicacion").val();
  let fecha = getFecha();

  e.preventDefault();
  $.ajax(
        {
            url:"crear_mesa.php?nomMesa="+nombre+"&ubic="+ubic+"&numMesa="+numMesa+"&fecha="+fecha,
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
      $("#modalRegistro").modal('hide'); 
      $('#mesas').DataTable().ajax.reload();
    }
  })
  .fail(function(e)
  {
    console.log(e.responseText);
  })
});

$("#btnModificar").on("click", function(e)
{
  let numMesa = $("#numMesaEditar").val();
  let nombre = $("#nomMesaEditar").val();
  let ubicacion = $("#slctUbicacionEditar").val();
  let id = $("#idMesa").text();

  e.preventDefault();
  $.ajax(
        {
            url:"editar_mesa.php?numMesa="+numMesa+"&nomMesa="+nombre+"&ubic="+ubicacion+"&estado="+em+"&id="+id,
    type: "GET",
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
      $('#mesas').DataTable().ajax.reload();
      $("#modalEditar").modal('hide');
    }
  })
  .fail(function(e)
  {
    console.log(e.responseText);
  })
});

function obtenerNumMesa(ubicacion)
{
  $.ajax(
        {
            url:"read_num_mesa_ubic.php?ubic="+ubicacion,
    type: "POST",
    success: function(e)
    {
      $("#numMesa").html(e);
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

