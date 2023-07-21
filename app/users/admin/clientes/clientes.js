
let busqueda = "";
cargarDatosCliente(busqueda);


$("#btnAgregarCliente").on("click", function(e)
{
  $("#modalRegistro").modal("show");
});

function cargarDatosCliente(busqueda)
{
  $.ajax
  (
    {
    url:"read_clientes.php",
    data: {"busqueda": busqueda},
    type: "POST",
    success: function(e)
    {
      let json;
      try {
        json = JSON.parse(e);
        if(Array.isArray(json))
        {
          template = "";
          json.forEach(j=>{
            template += `
            <tr>
              <td>${j.id}</td>
              <td>${j.rut}</td>
              <td>${j.nombre}</td>
              <td>${j.apellido}</td>
              <td>${j.estado}</td>
              <td>${j.nombre_usuario}</td>
              <td>
                <button type="submit" id="btnVerCuentas" class="btn btn-success" onClick="btnVerCuentas(this)">Ver cuentas</button>
                <button type="submit" id="btnEditar" class="btn btn-primary"><img src="../img/edit.png" width="15"></button>
              </td>
            </tr>`
          });
          if(template=="")
          {
            template = "<tr><td colspan='8'>Sin resultados</td></tr>";
          }
        }
        else
        {
          template = "<tr><td colspan='8'>Sin resultados</td></tr>";
        }
      } 
      catch (e) 
      {
        return console.error("Error JSON Parse: "+e); // error in the above string (in this case, yes)!
      }
    
    $("#bodyCliente").html(template);
  }
})
}

$("#txtBusqueda").on("keyup", function(e)
{
  busqueda = $("#txtBusqueda").val()
  cargarDatosCliente(busqueda);
})

function btnVerCuentas(e)
{
  alert(e.id);
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
      if(e!=0)
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
              $("#modalRegistro").modal("hide");
              $("#formRegistroCliente").trigger("reset");
              cargarDatosCliente("");
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

