//obtener nombre y desglose de la caja
let caja = "";
let nCaja = "";
cargarDesglose();
$("#horaDesde").on("keyup", function(e)
{
  cargarDesglose();
});
$("#horaHasta").on("keyup", function(e)
{
  cargarDesglose();
});

$("#desgloseCaja").on("click", "button.btn-success", function()
{
  let element = $(this)[0].parentElement.parentElement;
  let id = $(element).attr('idVenta');
  location.href = "desglose_venta/index.php?idVenta="+id;
});

$("#btnReimprimirResumen").on("click", function(e)
{
  imprimirResumenVenta("../../../");
})



function cargarDesglose()
{
  caja = $("#nCaja").text();
  nomCaja = $("#nomCaja").text();
  let horaDesde = $("#horaDesde").val();
  let horaHasta = $("#horaHasta").val();
  $.ajax(
  {
    url: 'read_desglose_caja.php?idCaja='+caja+"&horaDesde="+horaDesde+"&horaHasta="+horaHasta,
    type: 'GET',
    success: function(response)
    {
      alert(response)
      let tasks = JSON.parse(response);
      let template = '';
      tasks.forEach(c=>{
        button = "<button type='button' class='btn btn-success' id='btnDetalleVenta'>Detalle</button>";
        estado = "";
        if(c.estado == "CERRADO")
        {
          estado = "CERRADO";
        }
        if(c.estado=="EN CURSO")
        {
          estado = "EN CURSO";
        }
        if(c.estado == "ANULADO")
        {
          estado = "ANULADO";
        }
        template+=
        `<tr idVenta=`+c.id_venta+` class="${estado}">
          <td>${c.id_venta}</td>
          <td>${c.creado_por}</td>
          <td>${c.desde}</td>
          <td>${c.hasta}</td>
          <td>${c.estado}</td>
          <td>$${c.valor_total}</td>
          <td>`+button+`</td>
        </tr>`;
        $("#caja").html(c.nombre);
      });
      if(template=="")
      {
        template = `
        <tr>
          <td colspan=9>Sin ventas</td>
        </tr>`;
      } 
        $("#bodyDetalleCaja").html(template);
      }
    }
  )
  .done( function() {
    console.log( 'Success!!' );
  }).fail( function(resp) {
    console.log( 'Error!! '+resp.ResponseText );
  }).always( function() {
    console.log( 'Always' );
  });

}