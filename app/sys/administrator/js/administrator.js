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
    {"data":"plan_comprado"},
    {"data":"fecha_registro"},
    {"data":"fecha_desde"},
    {"data":"fecha_hasta"},
    {"data":"estado_pago"},
    {
      'data' : null,
      'render': function (data, type, row, meta) {
          return `<button type="submit" class="btn btn-primary" onclick="abrirModalEditar(${data.id})"><i class='fa fa-edit' aria-hidden='true'></i></button>
          <button class='btn btn-secondary' onClick="mostrarInfo(${data.id})"><i class='fa fa-expand' aria-hidden='true'></i></button>`;
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
