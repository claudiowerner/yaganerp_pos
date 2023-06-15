cargarVentaGeneral();

//array que se envía a cuenta_general.php
let arrayCtaGral = Array();
let propina = 0;
let total = 0;
function cargarVentaGeneral()
{
  let nMesa = $("#nMesa").text();
  let propinaTotal = 0;
  $.ajax(
        {
            url:"func_php/read_ventas_pago_ind.php?nMesa="+nMesa,
    type: "GET",
    success: function(response)
    {
      let ventas = JSON.parse(response);
      let template_1 = "";
      let totalVentas = 0;
      let item = 0;
      let valorNeto = 0;
      ventas.forEach(v=>{
        $("#nMesa").html(v.mesa)
        p = 0;
        valorNeto = parseInt(valorNeto) + parseInt(v.valor);
        p = v.valor*0.1;
        propina = parseInt(propina) + parseInt(p);
        item ++;
        total = parseInt(v.valor)+parseInt(v.propina);
        let folio = v.folio;
        let nombre_prod = v.nombre_prod;
        let cantidad = v.cantidad;
        let valor = v.valor;
        input = "";
          if(v.propina!=0)
          {
            input = "<input type=checkbox id='checkPropina'  propina="+p+" id_venta="+v.id_venta_num+" checked/>";
            propinaTotal = parseInt(v.propina) + parseInt(propinaTotal);
          }
          else
          {
            input = "<input type=checkbox id='checkPropina'  propina="+p+" id_venta="+v.id_venta_num+"/>";
          }
            /*se verifica si existe propina asignada anteriormente. Si no existe propina asignada o no se ha marcado
            la propina, el checkbox estará desmarcado, de lo contrario, estará marcado*/


        arrayCtaGral.push({item, folio, nombre_prod, cantidad, valor, propina, total});
        template_1+=
        `<tr> 
          <td id=id_venta_num style="display:none">
            ${v.id_venta_num}
          </td>
          <td id=item>
            ${item} 
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
            <span>$</span><span id="valor${item}">${v.valor}</span>
          </td>
          <td>`;

          
            
          template_1 = template_1 + input + `</td>
          <td>
            <b>$</b><b id=propina>${(v.valor*0.1)}</b>
          </td>
          <td id=total align='left'>
            <b>$</b><b id='total${item}'>${total}</b>
          </td>
        </tr>
      <tr>`;
      totalVentas = totalVentas+total;
      
      });
      if(template_1=='')
      {
        $("#ctaInd").html("<tr><td>Sin ventas</td></tr>");
      }
      else
      {
        template_1 = template_1 + 
        
      `<tr>
        <td colspan=3>
          <input type='checkbox' id='checkPropinaCuentaGeneral' class='general' >
          <strong>Agregar propina total</strong>
        </td>
        <td colspan=2 rowspan=2 align=right>
          <strong>Total:</strong>
        </td>
        <td>
          <b>$</b><b id=valorNeto>${valorNeto}</b>
        </td>
        <td colspan=2 rowspan=2 align='center'>
          <b>$</b><b id=propinaCuentaGeneral>${propinaTotal}</b>
        </td>
        <td rowspan=2>
          <b>$</b><b id='totalVentaGeneral'>${parseInt(propinaTotal)+parseInt(valorNeto)}</b>
        </td>
      </tr><tr>
      <td colspan=4>
        <input type='checkbox' id='checkPropinaCuentaGeneralParcial' class='general'>
        <strong>Agregar propina parcial</strong>
      </td>`;
        $("#bodyImprCtaGral").html(template_1);
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