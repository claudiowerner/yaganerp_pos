
obtenerCierresCaja();
let nombre_caja = "";


id_usuario = cargarIDUsuario("../../");

$("#btnCrearCajaNueva").on("click", function(e)
{
  $.ajax(
    {
      url:"validar_turno_abierto.php",
      type: "GET",
      success: function(e)
      {
        let validarClave = validarSolicitudClave();
        if(e==1)
        {
          msjes_swal("Aviso", "Ya existe una caja abierta", "warning");
        }
        else
        {
          if(validarClave.match("S"))
          {
            $("#solicClaveAutAbrir").modal("show");
          }
          else
          {
            $("#abrirCaja").modal("show");
          }
        }
      }
    });
})

$("#btnValidar").on('click', function(e)
{
  let clave = $("#claveCrearCaja").val();
  if(clave=='')
  {
    $("#msjClave").html("<span style='color: red'>Debe rellenar el campo</span>");
  }
  else
  {
    $.ajax(
    {
      url:"clave_aut.php",
      data: {"clave": clave},
      type: "POST",
      success: function(e)
      {
        if(e==1)
        {
          $('#solicClaveAutAbrir').modal('hide'); 
          $('#abrirCaja').modal('show'); // abrir
        }
        else
        {
          $("#msjClave").html("<span style='color: red'>Clave incorrecta</span>");
        }
      }
    })
  }
});

$("#btnValidarCierre").on('click', function(e)
{
  let solicitar = validarSolicitudClave();
  let clave = $("#claveCerrarCaja").val();
  if(clave=='')
  {
    $("#msjClave").html("<span style='color: red'>Debe rellenar el campo</span>");
  }
  else
  {
    //ajax autorizacion clave
    $.ajax(
    {
      url:"clave_aut.php",
      data: {"clave": clave},
      type: "POST",
      success: function(e)
      {
        clave = e;
        if(clave==1)
        {
          $('#solicClaveAutCerrar').modal('hide');
          //ajax cerrar caja
          cierreCaja();
          
        }
        else
        {
          $("#msjClave").html("<span style='color: red'>Clave incorrecta</span>");
        }
      }
    })
    .fail(function(e)
    {
      msjes_swal("Error", e, "error");
    })
  }
});

$("#btnAbrirCaja").on('click', function(e)
{
  let fecha = getFecha();
  let hora = getHora();
  let nomCaja = $("#nombreCaja").val();
  
  if(nomCaja=="")
  {
    $("#msjCaja").html("<span style='color: red'>Debe rellenar el campo</span>");
  }
  else
  {
    $.ajax({
      url:"abrir_caja.php?nomCaja="+nomCaja+"&fecha="+fecha+"&hora="+hora,
      type: "GET",
      success: function(e)
      {
        msjes_swal("Excelente", e, "success");
        obtenerCierresCaja();
        $("#abrirCaja").modal("hide");
        $("#msjCaja").html("<span style='color: red'></span>");
      }
    })
  }
})

$("#cierreCaja").on('click', 'button.btn-success', function(e)
{
  let element = $(this)[0].parentElement.parentElement;
  let idCierre = $(element).attr('idCierre');
  let nomCaja = $(element).attr('nomCaja');
  location.href = "desglose/index.php?idCierre="+idCierre+"&nomCaja="+nomCaja;
})

$("#cierreCaja").on('click', 'button.btn-danger', function(e)
{
  let element = $(this)[0].parentElement.parentElement;
  let id = $(element).attr('idCierre');
  let nomCaja = $(element).attr('nomCaja');
  $("#nomCaja").html(nomCaja);
  $("#nCaja").html(id);
  $("#idCierre").html(id);
  let solicitar = validarSolicitudClave();//valida si se solicita la clave de autorizacion para cerrar caja o no
  
  swal({
    title: "¿Seguro?",
    text: 
    `¿Desea cerrar este turno/caja?`,
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((cerrar) => {
    if (cerrar)
    {
      if(solicitar.match(/N/))
      {
        cierreCaja();
      }
      else
      {
        $("#solicClaveAutCerrar").modal("show");
      }
    } 
    else 
    {
      swal("Operación cancelada");
    }
  });
  
});




//filtrar registros cierre caja
$("#fechaDesde").on("keyup", function(e)
{
  obtenerCierresCaja();
})
$("#fechaHasta").on("keyup", function(e)
{
  obtenerCierresCaja();
})

function cierreCaja()
{
  let cajaAbierta = validarCajasDeVentaAbierta();
  cajaAbierta = parseInt(cajaAbierta);

  if(cajaAbierta==0)
  {
    let idCierre = $("#idCierre").text(); 
    $.ajax(
    {
      url:"cierre_caja.php?idCierre="+idCierre,
      data: "GET",
      success: function(e)
      {
        if(e.match(/No se puede cerrar/))
        {
          msjes_swal("Aviso", e, "warning");
        }
        else
        {
          msjes_swal("Excelente", e, "success");
          //imprimirResumenVenta("../../",idCierre);
        }
        obtenerCierresCaja();
      }
    })
    .fail(function(e)
    {
      msjes_swal("Error", e, "error");
    })
  }
  else
  {
    msjes_swal("Aviso", "Se deben cerrar todas las cajas de atención al cliente que estén abiertas", "warning");
  }
}

function validarCajasDeVentaAbierta()
{
  return $.ajax(
    {
      url: "validar_caja_abierta.php",
      type: "POST",
      async: false,
    }
  ).responseText;
}

function validarSolicitudClave()
{
  let retornar = "";
  $.ajax({
    url: "validar_solicitar_clave.php",
    type: "POST",
    async: false, 
    success: function(e)
    {
      retornar = e;
    }
  })
  return retornar;
}