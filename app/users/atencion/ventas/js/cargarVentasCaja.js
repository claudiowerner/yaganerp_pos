//carga las ventas asociadas a una mesa y listarlas en el index
function cargarVentasCaja()
{
  let nCaja = $("#nCaja").text();
  let id_venta = $("#id_venta").text();
  let template_1 = '';
  let estado = '';
  $.ajax(
    {
      url:"func_php/read_ventas.php?nCaja="+nCaja+"&idVenta="+id_venta,
      type: "GET",
      success: function(response)
      {
        let tasks = JSON.parse(response);
        tasks.forEach(v=>{
          descProd.push({"nom_prod": v.nombre_prod, "cant":v.cantidad});
          let aumentar;
          let imprimir;
          let eliminar;
          if(v.estado=='A')
          {
            estado = "<button class='btn btn-danger' disabled='true'>PENDIENTE</button>";
            aumentar = "<button class='btn btn-success modCant' id='"+v.id+"' pesaje='"+v.pesaje+"' cant='"+v.cantidad+"' id_prod='"+v.id_prod+"' onClick=obtenerIDVenta(this)>+O-</button>";
            eliminar = "<button id='btnEliminarVenta' idVenta='"+v.id+"' class='btn btn-danger' onClick=accionEliminarVenta(this)>Eliminar</button>";
            imprimir = "<button id='imprimir' class='btn btn-warning'>Imprimir</button>";
          }
          else
          {
            estado = "<button class='btn btn-success' disabled='true'style='width: 100%;'>PAGADO</button>";
            aumentar = "<button class='btn btn-success' disabled='true'>+O-</button>";
            eliminar = "<button class='btn btn-danger'  disabled='true'>Eliminar</button>";
            imprimir = "<button id='imprimir' class='btn btn-warning' disabled='true'>Imprimir</button>";
          }
          template_1+=`<tr>
                        <td>
                          ${v.usuario}
                        </td>
                        <td>
                          ${v.nombre_prod}
                        </td>
                        <td id=nombre_cat>
                          ${v.nombre_cat}
                        </td>
                        <td id=cantVenta>
                          ${v.cantidad}
                        </td>
                        <td id=valVenta>
                          $${v.valor}
                        </td>
                        <td>
                          ${estado}
                        </td>
                        <td id=fecha>
                          ${v.fecha}
                        </td>
                        <td>
                          ${aumentar}
                        </td>
                        <td>
                          ${eliminar}
                        </td>
                        <td>
                          ${imprimir}
                        </td>
                      </tr>
                    <tr>`;
        });
        let subtotal = 0;
        let subtotal_iva = 0;
        let iva = 0;
        let total= 0;
        tasks.forEach(v=>{
          subtotal = parseFloat(subtotal)+parseFloat(v.valor);
          iva = parseFloat(subtotal)+parseFloat(v.valor);
        })
        subtotal_iva = Math.round(subtotal*0.81);
        iva = Math.round(subtotal*0.19);
        total = parseInt(subtotal_iva)+parseInt(iva);
        if(template_1=='')
        {
          $("#ventas").html("<tr><td>Sin ventas</td></tr>");
          $('#ctaCompleta').attr('disabled', true);
          $('#ctaIndividual').attr('disabled', true);
          $('#imprCtaInd').attr('disabled', true);
          $('#btnPagoCtaCompleta').attr('disabled', true);
          $('#btnPagoInd').attr('disabled', true);
          $('#imprCtaIndividual').attr('disabled', true);
          $('#imprModalCuentaGeneral').attr('disabled', true);
          $('#btnAnular').attr('disabled', true);
        }
        else
        {
          $("#ventas").html(template_1);
          //activar botones

          $('#ctaCompleta').attr('disabled', true);
          $('#ctaIndividual').attr('disabled', true);
          $('#imprCtaInd').attr('disabled', true);
          $('#btnPagoCtaCompleta').attr('disabled', false);
          $('#btnPagoInd').attr('disabled', false);
          $('#imprCuentaGeneral').attr('disabled', false);
          $('#imprCtaIndividual').attr('disabled', false);
          $('#imprModalCuentaGeneral').attr('disabled', false);
          $('#btnAnular').attr('disabled', false);

          //números en dinero
          $("#subtotal").html(subtotal_iva);
          $("#iva").html(iva);
          $("#totalVenta").html(total);
          
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





