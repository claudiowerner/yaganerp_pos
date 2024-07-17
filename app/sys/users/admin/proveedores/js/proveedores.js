epr = "S"; //almacena el estado del proveedor

$("#swEstado").on("click", function(e)
{
  if(e.target.checked)
  {
    epr = "S";
  }
  else
  {
    epr = "N";
  }
})


//Datatable
var idCat = 0;
table = $('#producto').DataTable({
  "createdRow": function( row, data, dataIndex){
  },
  "ajax":{
  "url":"read_proveedores.php",
  "type":"GET",
  "dataSrc":""
  },
    //columnas
    "columns":[
      {"data":"id"},
      {"data":"rut"},
      {"data":"nombre_proveedor"},
      {"data":"fecha_registro"},
      {
        "data": null,
          "render": function (data, type, row) {
            return `<button type='submit' id='btnEditar' class='btn btn-primary' onClick="abrirModalEditarProveedor('${data.id}', '${data.rut}', '${data.nombre_proveedor}')"><i class='fa fa-edit' aria-hidden='true'></i></button>
            <button type='submit' id='btnEliminar' class='btn btn-danger' onClick='eliminarPedido("+data.id+")'><i class='fa fa-trash-o' aria-hidden='true'></i></span></button>`;
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


$("#txtRutProveedor").on("keyup", function(e)
{
  let rut = $("#txtRutProveedor").val();
  validarRut = fnValidarRut.validaRut(rut);
  lblRutValido(validarRut);
  
});


$("#txtNombreProveedor").on("keyup", function(e)
{
  validarTextBoxs();
  
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

function getFechaBD()
{
  var hoy = new Date();
  //fecha
  let dia = hoy.getDate();
  let mes = parseInt(hoy.getMonth())+parseInt(1);
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
