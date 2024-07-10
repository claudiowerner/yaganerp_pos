
let busqueda = "";

$("#btnAgregarCliente").on("click", function(e)
{
  $("#modalRegistro").modal("show");
});


$("#txtBusqueda").on("keyup", function(e)
{
  busqueda = $("#txtBusqueda").val()
  cargarDatosCliente(busqueda);
})

function btnVerCuentas(rut)
{
  location.href = "cuentas/index.php?rut="+rut;
}



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
      url:"funciones/editar_producto_exe.php?codigo_barra="+cod_barra+"&id="+id+"&nomProd="+np+"&cat="+lc+"&can="+can+"&vv="+vv+"&vn="+vn+"&estado="+ep+"&hora="+hora+"&medida="+unid+"&pesaje="+rpEditar,
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
          msjes_swal("Aviso", e, "warning");
        }
        if(e.match("Error")||e.match("error"))
        {
          msjes_swal("Error al modificar", e, "error");
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

