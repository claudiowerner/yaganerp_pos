
$("#btnAgregarCaja").on("click", function(e)
{
  $("#modalRegistro").modal("show");
})

ec = ""; //almacena el estado del cliente (switch)
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
          "url":"read_cliente.php",
          "type":"GET",
          "dataSrc":""
        },
        //columnas
        "columns":[
          {"data":"id"},
          {"data":"nombre"},
          {"data":"rut"},
          {"data":"estado"},
          {"data":"correo"},
          {"data":"telefono"},
          {"data":"plan_comprado"},
          {"data":"fecha_pago"},
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
  $("#modalEditar").modal('show'); 
  $("#idCliente").html(datos.id);
  
  $.ajax({
    url: "read_cliente_seleccionado.php",
    data: {"id": datos.id},
    type: "POST",
    success: function(e)
    {
      json = JSON.parse(e);
      json.forEach(datos=>
        {
          $("#nomClienteEditar").val(datos.nombre);
          $("#rutEditar").val(datos.rut);
          $("#correoEditar").val(datos.correo);
          $("#telefonoEditar").val(datos.telefono);
          $("#direccionEditar").val(datos.direccion);
          $("#planEditar").val(datos.plan_comprado);
          $("#fechaPagoEditar").val(datos.fecha_pago);
          $("#nomFantasiaEditar").val(datos.nom_fantasia);
          $("#razonSocialEditar").val(datos.razon_social);
        })
    }
  })
  
  if(datos.estado == "ACTIVO")
  {
    $("#swEstadoCliente").prop("checked", true);
    ec = "S";
  }
  else
  {
    $("#swEstadoCliente").prop("checked", false);
    ec = "N";
  }
  
});

$("#btnGuardar").on("click", function(e)
{
  e.preventDefault();
  let nombre = $("#nomCliente").val();
  let rut = $("#rut").val();
  let correo = $("#correo").val();
  let telefono = $("#telefono").val();
  let direccion = $("#direccion").val();
  let plan = $("#plan").val();
  let fechaPago = $("#fechaPago").val();
  let nomFantasia = $("#nomFantasia").val();
  let razonSocial = $("#razonSocial").val();

  datos = {
    "nombre": nombre,
    "rut":rut,
    "correo":correo,
    "telefono":telefono,
    "direccion":direccion,
    "plan":plan,
    "fechaPago":fechaPago,
    "nomFantasia":nomFantasia,
    "razonSocial":razonSocial
  }
  $.ajax({
    url:"crear_cliente.php",
    data: datos,
    type: "POST",
    success: function(e)
    {
      $("#errNomPiso").html("");
      if(e.match("correctamente"))
      {
        msjes_swal("Excelente", e, "success");
      }
      if(e.match("Error")||e.match("error"))
      {
        msjes_swal("Error al modificar", e, "error");
      }
      $('#producto').DataTable().ajax.reload();
      $("#modalRegistro").modal("hide");
    }
  })
  .fail(function(e)
  {
    console.log(e.responseText);
  })
  

});

$("#swEstadoCliente").on("click", function(e)
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

$("#btnModificar").on("click", function(e)
{
  let id = $("#idCliente").text();
  let nombre = $("#nomClienteEditar").val();
  let rut = $("#rutEditar").val();
  let correo = $("#correoEditar").val();
  let telefono = $("#telefonoEditar").val();
  let direccion = $("#direccionEditar").val();
  let plan = $("#planEditar").val();
  let fechaPago = $("#fechaPagoEditar").val();
  let nomFantasia = $("#nomFantasiaEditar").val();
  let razonSocial = $("#razonSocialEditar").val();


  datos = {
    "id": id,
    "nombre": nombre,
    "rut":rut,
    "correo":correo,
    "telefono":telefono,
    "direccion":direccion,
    "plan":plan,
    "fechaPago":fechaPago,
    "nomFantasia":nomFantasia,
    "razonSocial":razonSocial,
    "estado": ec
  }
  
    e.preventDefault();
    $.ajax({
      url:"editar_cliente.php",
      data: datos, 
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
      }
    })
    .fail(function(e)
    {
      console.log(e.responseText);
    })
  
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
