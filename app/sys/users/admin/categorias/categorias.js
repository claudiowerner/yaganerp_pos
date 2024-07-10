ec = ""; //almacena el estado del piso
$("#swEditarCategoria").on("click", function(e)
{
  if(e.target.checked)
  {
    ec = "S";
  }
  else
  {
    ec = "N";
  }
})
var table;


  //Datatable
  table = $('#categoria').DataTable({
    "createdRow": function( row, data, dataIndex){
    },

      "ajax":{
        "url":"read_categorias.php",
        "type":"GET",
        "dataSrc":""
      },
      //columnas
      "columns":[
        {"data":"item"},
        {"data":"nombre_cat"},
        {"data":"creado_por"},
        {"data":"fecha_reg"},
        {
          'data' : null,
          'render': function (data, type, row, meta) {
          var prueba = "idCategoria";
          table = $('#categoria').DataTable();
          var arr = table
            .column()
            .data()
            .toArray();
            return `<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar" id="btnEditar"><img src="../img/edit.png" width="15"></button>`;
            //<button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modalDesact" id="btnDesact"><img src="../img/shutdown.png" width="15"></button>`;
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


$("#formRegistro").submit(function(e)
{
  e.preventDefault();
  let nombre = $("#nomCat").val();
  if(nombre=='')
  {
    $("#lblNombre").html("<span style='color:red'>Campo requerido</span>");
    $("#nomCat").focus();
  }
  else
  {
    $.ajax({
      url:"crear_categoria_exe.php",
      type: "POST",
      data: {"nomCat":nombre},
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
        
        if(e.match("Error")||e.match("error"))
        {
          swal({
            title: "Error al modificar",
            text: e,
            icon: "error",
          });
        }
        $("#categoria").DataTable().ajax.reload();
        $("#formRegistro").trigger('reset');
        $("#modalRegistro").modal("hide");
      }
    })
  }
});


$("#categoria").on('click', 'tr', function(e)
{
  var cat = $('#categoria').DataTable();
  var datos = cat.row(this).data();
  $("#nomCatEditar").val(datos.nombre_cat);
  $("#idModal").html(datos.id);
  
  if(datos.estado == "ACTIVO")
  {
    $("#swEditarCategoria").prop("checked", true);
    ec = "S";
  }
  else
  {
    $("#swEditarCategoria").prop("checked", false);
    ec = "N";
  }
});

$("#btnGuardarCambios").on('click', function(resp)
{
  var nc = $("#nomCatEditar").val();
  var id = $("#idModal").text();
  var hora = getHora();
  
  $.ajax(
        {
            url:"editar_categoria_exe.php",
    type: "POST",
    data: {"nomCat":nc, "estadoCat":ec, "id":id, "hora":hora},
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
        if(e.match("No se puede desactivar"))
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
      $("#lblMsj").html("<span style='color:green'>"+e+"</span>");
      $('#categoria').DataTable().ajax.reload();
      $("#formRegistro").trigger('reset');
      $("#modalEditar").modal("hide");
    }
  })
});

function getHora()
{
  var hoy = new Date();
  var h = hoy.getHours();
  var min = hoy.getMinutes();
  var sec = hoy.getSeconds();
  if(hora<10)
  {
    h = '0'+h;
  }
  if(min<10)
  {
    min = '0'+min;
  }
  if(sec<10)
  {
    sec = '0'+sec;
  }
  var hora = h+":"+min+":"+sec;
  return hora;
}