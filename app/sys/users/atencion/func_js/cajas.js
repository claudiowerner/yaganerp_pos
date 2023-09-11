
  let id = "";
  let fecha = getFecha();
  let hora = getHora();
  let ubic = "";
  let tipoVenta = "";
  let nomMesa = "";

  $.ajax({
    url: "caja/caja.php?fecha="+fecha+"&hora="+hora, 
    type: "GET",
    success: function(e)
    {
      if(e=="0"||e.match(/0/))
      {
        $("#cajas").html(`<div align=center class="card bg-gradient-danger">
              <div class="card-header">
                <h3 align="center" class="card-title"><strong>EL SISTEMA SE BLOQUEÓ</strong></h3>
              </div>
              <div class="card-body">
                Esto se debe a que no existe ninguna apertura de caja activa, o bien, la caja correspondiente a la fecha ${fecha}/${hora} no se creó correctamente.<br> Para poder continuar, <strong>solicite al administrador de sistema que cree otra apertura de caja o modifique la caja creada</strong> y así, poder operar con normalidad.
              </div>
              <!-- /.card-body -->
            </div>`);
      }
      if(e==1)
      {
        obtener_cajas();
      }
    }
  })
  $("#prod").select2();

  
  function obtener_cajas()
  {
    $.ajax(
    {
      url: 'func_php/read_cajas.php',
      type: 'GET',
      success: function(response)
      {
        let tasks = JSON.parse(response);
        let template = '';
        tasks.forEach(task=>{
          clase = "";
          if(task.estado=="S")
          {
            clase = "btn-primary";
          }
          if(task.estado=="A")
          {
            clase = "btn-danger";
          }
          template+=
          `<button class='btn ${clase}' nroCaja=${task.id} nomCaja=${task.nombre}><h1>${task.nombre}</h1></button>`;
        });
        $("#cajas").html(template);
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

  //arreglo obtener ID
  let array = new Array();


  $(document).on('click', '.btn-primary', function()
  {
    id = $(this).attr('nroCaja');
    nomCaja = $(this).attr("nomCaja");

    //CREAR CORRELATIVO
    let hora = getHora();
    $.ajax({
      url: "correlativo/correlativo.php?nomCaja="+nomCaja+"&idCaja="+id+"&hora="+hora,
      type: "GET",
      success: function(r)
      {
        location.href = "ventas/index.php?id="+id+"&nomCaja="+nomCaja;
      }
    })
    .done(function(){
      console.log("Done correlativo");
    })
    .fail(function(r)
    {
      console.log("fail correlativo: "+r.responseText)
    })
  });


  $(document).on('click', '.btn-danger', function()
  {
    id = $(this).attr('nroCaja');
    nomCaja = $(this).attr("nomCaja");
    location.href = "ventas/index.php?id="+id+"&nomCaja="+nomCaja;
  });


  function getHora()
  {
    var hoy = new Date();
    //hora
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
    dia = "0"+hoy.getDate();
  }
  if(mes<10)
  {
    mes = "0"+hoy.getMonth();
  }
  var fecha = ano+"-"+mes+"-"+dia;
  return fecha;
}
