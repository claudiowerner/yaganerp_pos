cargarVentaInd();
//funcion que carga las ventas asociadas a una mesa para generar cuenta individual
function cargarVentaInd()
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
          checkbox="<input type='checkbox' name='checkPagarVentaInd' id='checkPagarVentaInd' valor='"+v.valor+"' propina='"+v.propina+"' venta='"+v.id_venta_num+"' onClick='activarBotonCuentaInd(this)'>";
        }
        template_1+=`<tr>
                      <td>
                        ${checkbox}
                      </td>
                      <td id=nombre_prod>
                        ${v.nombre_prod}
                      </td>
                      <td id="cantidadProdTd">
                        ${v.cantidad}
                      </td>
                      <td>
                        $<strong id=valorInd name=valorInd>${v.valor}</strong>
                      </td>
                      <td>
                        $<strong id=propinaInd name=propinaInd>${v.propina}</strong>
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
        $("#btnPagoInd").prop("disabled", true);
      }
      else
      {
        template_1 = template_1 + 
        `<tr>
          <td colspan=3 align="right">
            <strong>Total: </strong>
          </td>
          <td>
            $<strong id=valorIndividual>0</strong>
          </td>
          <td id=propina>
            $<strong id=propinaIndividual>0</strong>
          </td>
          <td align='right'>
            
          </td>
          <td align='left'>
            $<strong id=totalIndividual>0</strong>
          </td>
        <tr>`;
        $("#ctaInd").html(template_1);
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