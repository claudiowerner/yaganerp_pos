
obtenerCierresCaja();
let nombre_caja = "";

$("#btnCrearCajaNueva").on("click", function(e)
{
  $.ajax(
    {
      url:"validar_caja_abierta.php",
      type: "GET",
      success: function(e)
      {
        if(e==1)
        {
          swal({
            title: "Aviso",
            text: "Ya existe una caja abierta",
            icon: "warning",
          });
        }
        else
        {
          $("#solicClaveAutAbrir").modal("show");
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
          let fecha = getFecha();
          let hora = getHora(); 
          let nCaja = $("#nCaja").text();
          nombre_caja = $("#nomCaja").text();
          //ajax cerrar caja
          $.ajax(
            {
              url:"cierre_caja.php?fecha="+fecha+"&hora="+hora+"&nCaja="+nCaja,
              data: "GET",
              success: function(e)
              {
                if(e.match(/No se puede cerrar/))
                {
                  swal({
                    title: "Aviso",
                    text: e,
                    icon: "warning",
                  });
                }
                else
                {
                  swal({
                    title: "Excelente",
                    text: e,
                    icon: "success",
                  });
                  
                  nCaja = $("#nCaja").text();
                  nomCaja = $("#nomCaja").text();

                  datos = {
                    "idCierre": nCaja,
                    "nomCaja": nomCaja
                  }
                  $.ajax(
                    {
                      url:"https://192.168.1.20/impresion_yaganerp/vendor/ticket_resumen_turno.php",
                      data: datos,
                      type: "POST",
                      success: function(e)
                      {
                        swal({
                          title: "Excelente",
                          text: e,
                          icon: "success"
                        })
                      }
                    }
                  )
                  .fail(function(e)
                  {
                    swal({
                      title: "Error",
                      text: e.responseText,
                      icon: "error"
                    })
                  })


                }
                obtenerCierresCaja();
              }
            })
            .fail(function(e)
            {
              swal({
                title: "Error",
                text: e,
                icon: "error",
              });
            })
          }
          else
          {
            $("#msjClave").html("<span style='color: red'>Clave incorrecta</span>");
          }
        }
      })
      .fail(function(e)
      {
        swal({
          title: "Error",
          text: e,
          icon: "error",
        });
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
        swal({
          title: "Excelente",
          text: e,
          icon: "success",
        });
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
  let id = $(element).attr('idCaja');
  let nomCaja = $(element).attr('nomCaja');
  location.href = "desglose/index.php?id="+id+"&nomCaja="+nomCaja;
})

$("#cierreCaja").on('click', 'button.btn-danger', function(e)
{
  let element = $(this)[0].parentElement.parentElement;
  let id = $(element).attr('idCaja');
  let nomCaja = $(element).attr('nomCaja');
  $("#nomCaja").html(nomCaja);
  $("#nCaja").html(id);
  $("#solicClaveAutCerrar").modal("show");
})

//filtrar registros cierre caja
$("#fechaDesde").on("keyup", function(e)
{
  obtenerCierresCaja();
})
$("#fechaHasta").on("keyup", function(e)
{
  obtenerCierresCaja();
})

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
function getFecha ()
{
  var hoy = new Date();
  //fecha
  let dia = hoy.getDate();
  let mes = hoy.getMonth()+1;
  let ano = hoy.getFullYear();

  if(dia<10)
  {
    dia = "0"+dia;
  }
  if(mes<10)
  {
    mes = "0"+mes;
  }
  var fecha = ano+"-"+mes+"-"+dia;
  return fecha;
}

function obtenerCierresCaja()
{
  let desde = $("#fechaDesde").val();

  let hasta = $("#fechaHasta").val();

  $.ajax(
  {
    url: "read_cierre_caja.php?desde="+desde+"&hasta="+hasta,
    type: "GET",
    async: false,
    success: function(response)
    {
      template = '';
      if(response)
      {
        try
        {
          let tasks = JSON.parse(response);
            tasks.forEach(c=>{
            button1 = ``;
            button2 = ``;
            fecha_cierre = "";
            estado = "";
            if(c.estado=="CERRADO")
            {
              estado = "CERRADO";
              button1 = "<button type='button' class='btn btn-danger' disabled=true id='btnCerrar'>Cerrar</button>";
              if(c.valor_total==0)
              {
                button2 = "<button type='button' class='btn btn-success' disabled=true id='btnVerDetalle'>Ir</button>";
              }
              else
              {
                button2 = "<button type='button' class='btn btn-success' id='btnCerrar'>Ir</button>";
              }
              fecha_cierre = c.hasta;
            }
            else
            {
              estado="EN-CURSO";
              button1 = "<button type='button' class='btn btn-danger' id='btnCerrar'>Cerrar</button>";
              button2 = "<button type='button' class='btn btn-success' id='btnVerDetalle'>Ir</button>";
              fecha_cierre = "-";
            }
            template+=
            `<tr idCaja=`+c.id+` nomCaja="`+c.nombre+`" class='${estado}' nomCaja='${c.nombre}'>
              <td>${c.id}</td>
              <td>${c.nombre}</td>
              <td>${c.creado_por}</td>
              <td>${c.desde}</td>
              <td>${fecha_cierre}</td>
              <td>${c.estado}</td>
              <td>$${c.valor_total}</td>
              <td>`+button1+button2+`</td>
            </tr>`;
          });
        }
        catch(e)
        {
          template = "<tr><td colspan='11'>Sin resultados</td></tr>";
        }
      }
      else
      {
        template = "<tr><td colspan='11'>Sin resultados</td></tr>";
      }
      $("#bodyCierreCaja").html(template);
    }
  })
  .done( function() {
    console.log( 'Success!!' );
  }).fail( function(resp) {
    console.log( 'Error!! '+resp.ResponseText );
  }).always( function() {
    console.log( 'Always' );  
  });
};

function tokenizerVoltearString(cadena)
{
  split = cadena.split("-");
  retorno = "";
  if(split.length!=1)
  {
    for (var i=split.length; i >= 0 ; i--)
    {
      if(split[i]!=""&&split[i]!=null)
      {
        if(split.length<=3)
        {
          retorno = retorno + split[i]+"-";
        }
        else
        {
          retorno = retorno + split[i];
        }
      }
    }
  }
  return retorno;
}