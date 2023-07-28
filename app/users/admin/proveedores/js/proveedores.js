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
    if( data.estado ==  `ACTIVO`){
      $(row).addClass('ACTIVO');
    }
    else
    {
      $(row).addClass('INACTIVO');
    }
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
      {"data":"estado"},
      {"data":"fecha_registro"},
      {
        "defaultContent": '<button type="submit" id="btnEditar" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar" ><img src="../img/edit.png" width="15"></button>'
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


$("#producto").on('click', 'tr', function(e)
{
  console.log(e)
  e.preventDefault();
  var cat = $('#producto').DataTable();
  var datos = cat.row(this).data();

  console.log(datos);

  let id = datos.id;
  let rut = datos.rut;
  let nombre = datos.nombre_proveedor;
  let estado = datos.estado;

  if(estado=="ACTIVO")
  {
    $("#swEstado").prop("checked", true)
  }
  else
  {
    $("#swEstado").prop("checked", false)
  }

  $("#idProv").val(id);
  $("#txtRutProveedorEditar").val(rut);
  $("#txtNombreProveedorEditar").val(nombre);

});
$("#formRegistroProveedor").submit(function(e)
{
  e.preventDefault();
  let rut = $("#txtRutProveedor").val();
  let nombre = $("#txtNombreProveedor").val();

  let datos ={
    "rut": rut,
    "nombre": nombre,
    "fecha" : getFechaBD()
  }

  $.ajax({
    url: "crear_proveedor.php",
    data: datos,
    type: "POST",
    success: function(e)
    {
      swal({
        title: "Excelente",
        text: e,
        icon: "success"
      })
      $("#producto").DataTable().ajax.reload();
      $("#formRegistroProveedor").trigger('reset');
      $("#modalRegistro").modal("hide");
    }
  })
  .fail(function(e)
  {
    swal({
      title: "Error",
      text: e.responseText,
      icon: "error"
    })
  })

});

//editar producto


$("#formEditarProducto").submit(function(e)
{
  e.preventDefault();
  let id = $("#idProv").val();
  let rut = $("#txtRutProveedorEditar").val();
  let nombre = $("#txtNombreProveedorEditar").val();
  
  datos = {
    "id": id,
    "rut": rut,
    "nombre": nombre,
    "estado": epr,
    "hora": getHora()
  }


  $.ajax(
    {
      url:"editar_proveedor.php",
      data: datos,
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
        $('#producto').DataTable().ajax.reload();
        $("#formRegistro").trigger('reset');
        $("#modalEditar").modal("hide");
      }
    })
    .fail(function(e)
    {
      console.log(e.responseText);
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
