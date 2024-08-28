cargarPlan();

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
    "url":"php/cliente/clientes/read_cliente.php",
    "type":"GET",
    "dataSrc":""
  },
  //columnas
  "columns":[
    {"data":"nombre"},
    {"data":"rut"},
    {"data":"estado"},
    {"data":"fecha_registro"},
    {"data":"fecha_desde"},
    {"data":"fecha_hasta"},
    {"data":"estado_pago"},
    {
      'data' : null,
      'render': function (data, type, row, meta) {
          return `<button type="submit" class="btn btn-primary" onclick="abrirModalEditar(${data.id}, ${data.id_plan}, ${data.plazo_pago}, ${data.giro})"><i class='fa fa-edit' aria-hidden='true'></i></button>
          <button class='btn btn-secondary' onClick="mostrarInfo(${data.id})"><i class='fa fa-expand' aria-hidden='true'></i></button>
          <button class='btn btn-success' onClick="abrirModalComprobantes(${data.id})"><i class='fa fa-ticket' aria-hidden='true'></i></button>
          <button class='btn btn-success' onClick="abrirModalPagos(${data.id})"><i class='fa icon-plus' aria-hidden='true'></i><i class='fa fa-dollar' aria-hidden='true'></i></button>`;
      }
    },
    {
      'data' : null,
      'render': function (data, type, row, meta) {
        let disabled = "";
        let disabledPassNueva = "";
        if(data.num_usuario_admin>0)
        {
          disabled = "disabled";
          disabledPassNueva = "";
        }
        else
        {
          disabled = "";
          disabledPassNueva = "disabled";
        }
        return `<button type="submit" id="credencialCliente${data.id}" class="btn btn-primary" onclick="crearUsuarioAdmin(${data.id}, '${data.nombre}', '${data.correo}')" ${disabled}>
          <i id='creandoUsuario${data.id}' class='fa fa-user' aria-hidden='true'></i>
        </button>
        <button type="submit" id="passNueva${data.id}" class="btn btn-primary" onclick="enviarNuevaContraseña(${data.id}, '${data.nombre}', '${data.correo}')" ${disabledPassNueva}>
          <i id='creandoUsuario${data.id}' class='fa fa-key' aria-hidden='true'></i>
          <i id='creandoPassNueva${data.id}' class='fontello-paper-plane' aria-hidden='true'></i>
        </button>`;
      }
    },
    {
      'data' : null,
      'render': function (data, type, row, meta) {
          return `<button type="submit" class="btn btn-danger" onclick="eliminarCliente(${data.id}, '${data.nombre}')"><i class='fa fa-trash-o' aria-hidden='true'></i></button>`;
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
