//carga las ventas asociadas a una mesa y listarlas en el index
function cargarVentasCaja()
{
  let nCaja = parseInt($("#nCaja").text());
  let id_venta = parseInt($("#id_venta").text());
  let template_1 = '';
  let estado = '';
  $.ajax(
    {
      url:"func_php/venta/read_ventas.php?nCaja="+nCaja+"&idVenta="+id_venta,
      type: "GET",
      async: false,
      success: function(response)
      {
        let tasks = JSON.parse(response);
        let contador = 0;
        let descuento = 0;
        tasks.forEach(v=>{
          contador++;
          descProd.push({"id_venta":v.id,"nom_prod": v.nombre_prod,"codigo_barra":v.codigo_barra, "cant":v.cantidad,"valor":v.valor});
          let aumentar;
          let eliminar;
          descuento = parseInt(descuento) + parseInt(v.descto);
          if(v.estado=='A')
          {
            estado = "<button class='btn btn-danger' disabled='true'>PENDIENTE</button>";
            aumentar = "<button class='btn btn-success modCant' id='"+v.id+"' pesaje='"+v.pesaje+"' cant='"+v.cantidad+"' id_prod='"+v.id_prod+"' onClick=obtenerIDVenta(this)>- Ó +</button>";
            eliminar = "<button id='btnEliminarVenta' class='btn btn-danger' onClick=accionEliminarVenta("+v.id+")>Eliminar</button>";
            imprimir = "<button id='imprimir' class='btn btn-warning'>Imprimir</button>";
            $('#btnCrearVenta').attr('disabled', true);
          }
          else
          {
            estado = "<button class='btn btn-success' disabled='true'style='width: 100%;'>PAGADO</button>";
            aumentar = "<button class='btn btn-success' disabled='true'>- Ó +</button>";
            eliminar = "<button class='btn btn-danger'  disabled='true'>Eliminar</button>";
            imprimir = "<button id='imprimir' class='btn btn-warning' disabled='true'>Imprimir</button>";
            $('#btnCrearVenta').attr('disabled', false);
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
                      </tr>
                    <tr>`;
        });
        $("#totalDescuento").html(descuento)
        $("#nProd").html(contador);
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
          $('#btnAñadirCuenta').attr('disabled', true);
          $('#btnCrearVenta').attr('disabled', true);
          
          $("#subtotal").html(0);
          $("#iva").html(0);
          $("#totalVenta").html(0);
        }
        else
        {
          $("#ventas").html(template_1);
          //activar botones

          $('#imprimirBoleta').attr('disabled', false);
          $('#pagarVenta').attr('disabled', false);
          $('#btnAñadirCuenta').attr('disabled', false);

          //números en dinero
          $("#subtotal").html(subtotal_iva);
          $("#iva").html(iva);
          $("#totalVenta").html(total);
        }
      }
    }).fail( function(e) {
      console.log( 'Error productos!!'+e);
    }).done( function() {
      //
    })
    id_venta = $("#id_venta").text();
    nCaja = $("#nCaja").text();
    $.ajax(
      {
        url:"func_php/descuento/cargarDescto.php",
        data: {"id_venta": id_venta},
        type: "POST",
        success: function(e)
        {
          cargarDescto();
          $("#descuento").html(parseInt(e));
          let totalVenta = parseInt($("#totalVenta").text());
          let descto = parseFloat($("#descuento").text()/100);
          let desctoHecho = Math.round(totalVenta*descto);
          let valorPostDescto = totalVenta-desctoHecho;
          $("#totalDescuento").html(desctoHecho);
          $("#totalVenta").html(valorPostDescto);

        }
      }
    )
    .fail(function(e)
    {
      msjes_swal("Error al cargar ID de la venta: ",e,"error");
    })
}





