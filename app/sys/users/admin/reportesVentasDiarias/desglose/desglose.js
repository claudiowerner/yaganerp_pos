
$( document ).ready(function() {
  
  //obtener nombre y desglose de la caja
  let caja = "";
  let nCaja = "";

  caja = $("#nCaja").text();
  nomCaja = $("#nomCaja").text();
  idCierre = $("#idCierre").text();

  valor = 0;
  let horaDesde = $("#horaDesde").val();
  let horaHasta = $("#horaHasta").val();
  $.ajax(
  {
    url: 'read_desglose.php?idCaja='+caja+"&horaDesde="+horaDesde+"&horaHasta="+horaHasta+"&idCierre="+idCierre,
    type: 'GET',
    success: function(response)
    {
      let tasks = JSON.parse(response);
      let template = '';
      tasks.forEach(c=>{
        button = "<button type='button' id='btnDetalleCaja' idCaja='"+c.id+"' nomCaja='"+c.nom_caja+"' class='detalle btn btn-success' onClick='btnDetalle(this)'>Detalle</button>";
        estado = c.estado;
        if(estado == "S")
        {
          estado = "CERRADO";
        }
        if(estado == "A")
        {
          estado = "ABIERTO";
        }
        
        valor_formateado = formatearNumero("P",c.valor);
        template+=
        `<tr class="${estado}">
          <td>${c.nom_caja}</td>
          <td>${estado}</td>
          <td>${valor_formateado}</td>
          <td>`+button+`</td>
        </tr>`;
        valor = parseInt(valor)+parseInt(c.valor);
        $("#caja").html(c.nombre);
      });
      if(template=="")
      {
        template = `
        <tr>
          <td colspan=9>Sin ventas</td>
        </tr>`;
      }
      valor_total_formateado = formatearNumero("P",valor);
      template+=
      `<tr>
        <td colspan=2>TOTAL: </td>
        <td>${valor_total_formateado}</td>
      </tr>`;
      $("#bodyDetalleCaja").html(template);
    }
  })
  .done( function() {
    console.log( 'Success!!' );
  }).fail( function(resp) {
    console.log( 'Error!! '+resp.ResponseText );
  }).always( function() {
    console.log( 'Always' );
  });



  $("#horaDesde").on("keyup", function(e)
  {
    cargarDesglose();
  });
  $("#horaHasta").on("keyup", function(e)
  {
    cargarDesglose();
  });

  /*$("#clase").on("click", function()
  {
    
  });*/

  $("#btnReimprimirResumen").on("click", function(e)
  {
    imprimirResumenVenta("../../../",idCierre);
  })
})

function btnDetalle(e)
{
  let id = $(e).attr('idCaja');
  let nom_caja = $(e).attr('nomCaja');
  location.href = "desglose_caja/index.php?id="+id+"&nomCaja="+nom_caja+"&idCierre="+idCierre;
}
  
