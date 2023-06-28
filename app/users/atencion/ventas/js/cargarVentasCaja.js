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
                        <td>
                          <a id=cantVenta>${v.cantidad}</a> ${v.nombre_medida}
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
          $('#imprimirBoleta').attr('disabled', true);
          $('#pagarVenta').attr('disabled', true);
        }
        else
        {
          $("#ventas").html(template_1);
          //activar botones

          $('#imprimirBoleta').attr('disabled', false);
          $('#pagarVenta').attr('disabled', false);

          //números en dinero
          $("#subtotal").html(subtotal_iva);
          $("#iva").html(iva);
          $("#totalVenta").html(total);
          
        }
      }
    }).fail( function(e) {
      console.log( 'Error productos!!'+e);
    }).done( function() {
      console.log( 'done productos' );
    })
}





