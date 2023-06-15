cargarImprCuentaInd();
function cargarImprCuentaInd()
{
  let nMesa = $("#nMesa").text();
  $.ajax(
        {
            url:"func_php/read_ventas_pago_ind.php?nMesa="+nMesa,
    type: "GET",
    success: function(response)
    {
      let ventas = JSON.parse(response);
      let template_1 = "";
      ventas.forEach(v=>{
        let total = parseFloat(v.valor)+parseFloat(v.propina);
        let checkbox = "";
        if(v.estado=="C"||v.estado=="N")
        {
          checkbox="";
        }
        else
        {
          checkbox="<input type='checkbox' name='"+total+"' id='checkCuentaIndividual' venta='"+v.id+"' >";
        }
        template_1+=`<tr>
                      <td>
                        ${checkbox}
                      </td>
                      <td>
                        ${v.id}
                      </td>
                      <td>
                        ${v.folio}
                      </td>
                      <td id=ubicacion>
                        ${v.ubicacion}
                      </td>
                      <td id=nombre_prod>
                        ${v.nombre_prod}
                      </td>
                      <td id="cantidadProdTd">
                        ${v.cantidad}
                      </td>
                      <td>
                        $${v.valor}
                      </td>
                      <td id=propina>
                        $${v.propina}
                      </td>
                      <td align='right'>
                        $
                      </td>
                      <td id=total align='left'>
                        ${total}
                      </td>
                    </tr>
                  <tr>`;
      });
      
      if(template_1=='')
      {
        $("#ctaInd").html("<tr><td>Sin ventas</td></tr>");
      }
      else
      {
        template_1 = template_1 + 
        `<tr>
          <td colspan=8 align='right'>
            <strong>Total: </strong>
          </td>
          <td >
            <strong id=''>$</strong>
          </td>
          <td>
            <strong id='totalCuentaInd'></strong>
          </td> 
        <tr>`;
        $("#bodyImprCtaInd").html(template_1)
      }
    }
  }).fail( function(e) {
    console.log( 'Error productos!!'+e.responseText );
  }).done( function() {
    console.log( 'done productos' );
  }).always( function() {
    console.log( 'Always productos' );
  });
}