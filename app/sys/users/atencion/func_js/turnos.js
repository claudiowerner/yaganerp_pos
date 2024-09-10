
  let id = "";
  let fecha = getFecha();
  let hora = getHora();
  let ubic = "";
  let tipoVenta = "";
  let nomMesa = "";

  $.ajax({
    url: "func_php/turnos.php?fecha="+fecha+"&hora="+hora, 
    type: "GET",
    success: function(e)
    {
      if(e=="0"||e.match(/0/))
      {
        $("#sistSinTurnos").show();
        $("#pantallaPrincipal").hide();
        $("#fecha").html(fecha);
        $("#hora").html(hora);
      }
      if(e==1)
      {
        obtener_cajas();
      }
    }
  })
  $("#prod").select2();

  
  //arreglo obtener ID
  let array = new Array();



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
