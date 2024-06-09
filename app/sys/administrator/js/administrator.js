cargarPlan();


//validar rut de cliente nuevo
$("#rut").on("keyup", function(e)
{
  let rut = $("#rut").val();
  validarRut = fnValidarRut.validaRut(rut);
  if(validarRut)
  {
    $("#btnGuardar").attr("disabled", false);
  }
  else
  {
    $("#btnGuardar").attr("disabled", true);
  }
})

$("#rutEditar").on("keyup", function(e)
{
  let rut = $("#rut").val();
  validarRut = fnValidarRut.validaRut(rut);
  if(validarRut)
  {
    $("#btnModificar").attr("disabled", false);
  }
  else
  {
    $("#btnModificar").attr("disabled", true);
  }
})

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
    "url":"php/cliente/read_cliente.php",
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
    {"data":"fecha_registro"},
    {"data":"fecha_desde"},
    {"data":"fecha_hasta"},
    {"data":"estado_pago"},
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


let estado_pago = '';
$("#swEstadoPago").on("click", function(e)
{
  if(e.target.checked)
  {
    estado_pago = 'S'
  }
  else
  {
    estado_pago = "N";
  }
})
$("#producto").on("click", "tr", function(e)
{
  e.preventDefault();
  var cat = $("#producto").DataTable();
  var datos = cat.row(this).data();
  $("#modalEditar").modal('show'); 
  $("#idCliente").html(datos.id);
  
  $.ajax({
    url: "php/cliente/read_cliente_seleccionado.php",
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
          $("#slctPlanEditar").val(datos.plan_comprado);
          $("#fechaPagoEditar").val(datos.fecha_pago);
          $("#nomFantasiaEditar").val(datos.nom_fantasia);
          $("#razonSocialEditar").val(datos.razon_social);
          $("#fechaDesdeEditar").val(datos.fecha_desde);
          $("#fechaHastaEditar").val(datos.fecha_hasta);
          $("#slctGirosEditar").val(datos.giro);
          if(datos.estado_pago=='S')
          {
            $("#swEstadoPago").prop("checked",true);
          }
          else
          {
            $("#swEstadoPago").prop("checked",false);
          }
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
  let plan = $("#slctPlan").val();
  let fechaRegistro = getFecha();
  let fechaDesde = $("#fechaDesde").val();
  let fechaHasta = $("#fechaDesde").val();
  let nomFantasia = $("#nomFantasia").val();
  let razonSocial = $("#razonSocial").val();
  let tipoPago = $("#tipoPago").val();
  let giro = $("#slctGiros").val();
  if(nombre==""||rut==""||correo==""||telefono==""||direccion==""||plan==""||fechaDesde==""||fechaHasta==""||nomFantasia==""||razonSocial=="")
  {
    msjes_swal("Aviso", "Debe rellenar todos los campos", "warning");
  }
  else
  {
    datos = {
      "nombre": nombre,
      "rut":rut,
      "correo":correo,
      "telefono":telefono,
      "direccion":direccion,
      "plan":plan,
      "fechaRegistro":fechaRegistro,
      "fechaHasta":fechaHasta,
      "fechaDesde":fechaDesde,
      "nomFantasia":nomFantasia,
      "razonSocial":razonSocial,
      "giro":giro,
      "tipoPago":tipoPago,
      "fecha_pago":fechaDesde
    }
    console.log(datos)
    $.ajax({
      url:"php/cliente/crear_cliente.php",
      data: datos,
      type: "POST",
      success: function(e)
      {
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
  }
});

$("#btnVerComprobantes").on("click", function(e)
{
  $("#modalComprobantesPago").modal("show");
  $("#modalEditar").modal("hide");
});

$("#btnVolver").on("click", function(e)
{
  $("#modalComprobantesPago").modal("hide");
  $("#modalEditar").modal("show");
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
  let plan = $("#slctPlanEditar").val();
  let nomFantasia = $("#nomFantasiaEditar").val();
  let razonSocial = $("#razonSocialEditar").val();
  let fechaDesde = $("#fechaDesdeEditar").val();
  let fechaHasta = $("#fechaHastaEditar").val();
  let metodo_pago = $("#tipoPagoEditar").val();
  let giro = $("#slctGirosEditar").val();
  if(nombre==""||rut==""||correo==""||telefono==""||direccion==""||plan==""||fechaDesde==""||fechaHasta==""||nomFantasia==""||razonSocial=="")
  {
    msjes_swal("Aviso", "Debe rellenar todos los campos", "warning");
  }
  else
  {
    datos = {
      "id": id,
      "nombre": nombre,
      "rut":rut,
      "correo":correo,
      "telefono":telefono,
      "direccion":direccion,
      "plan":plan,
      "nomFantasia":nomFantasia,
      "razonSocial":razonSocial,
      "estado": ec,
      "fechaDesde":fechaDesde,
      "fechaHasta":fechaHasta,
      "metodo_pago":metodo_pago,
      "estado_pago":estado_pago,
      "giro":giro
    }
    e.preventDefault();
    $.ajax({
      url:"php/cliente/editar_cliente.php",
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
    mes = "0"+mes;
  }
  var fecha = ano+"-"+mes+"-"+dia;
  return fecha;
}
