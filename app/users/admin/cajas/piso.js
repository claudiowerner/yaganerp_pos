
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
          "url":"read_pisos.php",
          "type":"GET",
          "dataSrc":""
        },
        //columnas
        "columns":[
          {"data":"id"},
          {"data":"nombre"},
          {"data":"creado_por"},
          {"data":"estado"},
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
  
  document.getElementById("estadoPiso").value = estado;
});

$("#btnGuardar").on("click", function(e)
{
  let nombre = $("#nomPiso").val();
  if(nombre!="")
  {
    let fecha = getFecha();
    e.preventDefault();
    $.ajax({
      url:"crear_piso.php?nomPiso="+nombre+"&fecha="+fecha,
      type: "POST",
      success: function(e)
      {
        $("#errNomPiso").html("");
        if(e.match("correctamente"))
        {
          swal({
            title: "Excelente",
            text: e,
            icon: "success",
          });
        }
        if(e.match("Error")||e.match("error"))
        {
          swal({
            title: "Error al modificar",
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
    
    $("#errNomPiso").html("Debe rellenar este campo");
  }

});

$("#btnModificar").on("click", function(e)
{
  let nombre = $("#nomPisoEditar").val();
  if(nombre!="")
  {
    $("#errNomPisoEditar").html("");
    let idPiso = $("#idPiso").text();
    e.preventDefault();
    $.ajax({
      url:"editar_piso.php?idPiso="+idPiso+"&nomPiso="+nombre+"&estado="+ep,
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
        if(e.match("No se puede desactivar el piso porque existen ubicaciones activadas"))
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
            title: "Error al modificar",
            text: e,
            icon: "error",
          });
        }
        $('#producto').DataTable().ajax.reload();
        $("#modalEditar").modal("hide");
      }
    })
    .fail(function(e)
    {
      console.log(e.responseText);
    })
  }
  else
  {
    $("#errNomPisoEditar").html("Debe rellenar este campo");
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
