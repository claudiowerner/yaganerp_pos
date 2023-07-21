
$("#btnAgregarCliente").on("click", function(e)
{
  $("#modalRegistro").modal("show");
});




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
          "url":"read_clientes.php",
          "type":"GET",
          "dataSrc":""
        },
        //columnas
        "columns":[
          {"data":"id"},
          {"data":"rut"},
          {"data":"nombre"},
          {"data":"apellido"},
          {"data":"estado"},
          {"data":"nombre_usuario"},
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

$("#producto").on('click', 'tr', function(e)
{
  e.preventDefault();
  var cliente = $('#producto').DataTable();
  var datos = cliente.row(this).data();
  let rut = datos.rut;
  let nombre = datos.nombre;
  let apellido = datos.apellido;

  

});

function btnCuenta(e)
{
  alert("ver cuenta");
}

$("#formRegistroCliente").submit(function(e)
{
  e.preventDefault();
  let rut = $("#txtRutClte").val();
  let nombre =$("#txtNombreClte").val();
  let apellido =$("#txtApellido").val();
  
  $.ajax({
    url:"validar_rut.php",
    data: {"rut":rut},
    type: "POST",
    success: function(e)
    {
      alert(e)
      if(e==1)
      {
        swal({
          title: "Aviso",
          text: "Ya existe un cliente con el rut "+rut,
          icon: "warning",
        });
      }
      else
      {
        datos = 
        {
          "rut": rut,
          "nombre": nombre,
          "apellido": apellido,
          "fecha": getFechaBD()
        }
        console.log(datos)
        $.ajax(
          {
            url:"crear_cliente.php",
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
              $('#producto').DataTable().ajax.reload();
              $("#modalRegistro").modal("hide");
              $("#formRegistroCliente").trigger("reset");
            }
          })
          .fail(function(e)
          {
            swal({
              title: "Error",
              text: "Ocurrió un error al intentar registrar el producto: "+e.responseText,
              icon: "error",
            });
          })
      }
    }
  })
  .fail(function(e)
  {
    console.log("Ocurrió un error al intentar registrar el producto: "+e.responseText);
  })
});

//editar producto


$("#formEditarProducto").submit(function(e)
{
  e.preventDefault();
  var id = $("#tituloModalEditar").text();
  var np = $("#nomProdEditar").val();
  var cod_barra = $("#codBarraEditar").val();
  var lc = $("#listCatEditar").val();
  var can = $("#cantidadEditar").val();
  var vn = $("#valorNetoEditar").val();
  var vv = $("#valorVentaEditar").val();
  var unid = $("#slctUnidadEditar").val();
  var pesaje = "";

  //hora
  let hora = getHora();
  $.ajax(
    {
      url:"editar_producto_exe.php?codigo_barra="+cod_barra+"&id="+id+"&nomProd="+np+"&cat="+lc+"&can="+can+"&vv="+vv+"&vn="+vn+"&estado="+ep+"&hora="+hora+"&medida="+unid+"&pesaje="+rpEditar,
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

