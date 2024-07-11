
let rut = $("#rut").text()
let fechaInicio = "";
let fechaFin = "";

cargarNombreCliente(rut);
//cargarDatos(rut, fechaInicio, fechaFin);

function cargarNombreCliente(rut)
{
  $.ajax(
    {
      url: "read_datos_cliente.php",
      data: {"rut": rut},
      type: "POST",
      success: function(e)
      {
        let json = JSON.parse(e);
        json.forEach(j=>
          {
            $("#nombre").html(j.nombre);
            $("#apellido").html(j.apellido);
          })
      }
    }
  )
}


//Datatable

var table;

      //Datatable
      var idCat = 0;
      table = $('#producto').DataTable({
        "createdRow": function( row, data, dataIndex){
        },

          "ajax":{
            "url":"read_cuentas.php?rut="+rut,
            "type":"GET",
            "dataSrc":""
          },
          //columnas
          "columns":[
            {"data":"correlativo"},
            {"data": null,
                "bSortable": false,
                "mRender": function(data, type, value) {
                  let boton;

                  if(data.estado == "A")
                  {
                    boton = "<button class='btn btn-danger' width='100%' disabled>POR PAGAR</button>";
                  }
                  if(data.estado == "C")
                  {
                    boton = "<button class='btn btn-succes' width='100%' disabled>PAGADO</button>";
                  }
                  return boton;
                }},
            {"data":"fecha"},
            {"data": null,
              "bSortable": false,
              "mRender": function(data, type, value) {
                return formatearNumero("P", data.valor)
              }
            }
          ],

          //Configuración de Datatable
          "iDisplayLength": 10,
          "language": {
            "lenghtMenu":"Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados.",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch":"Buscar",
            "oPaginate":{
              "sFirst":"Primero",
              "sLast":"Último",
              "sNext":"Siguiente",
              "sPrevious":"Anterior"
            }
          }
        });


/*function cargarDatos(rut, fechaInicio, fechaFin)
{
  datos = {
    "rut": rut
  }
  $.ajax(
    {
      url: "read_cuentas.php",
      data: datos,
      type: "POST",
      success: function(e)
      {
        json = JSON.parse(e)
        template = "";

        valorTotal = 0;

        json.forEach(j=>{
          if(j.correlativo==null)
          {
            //
          }
          else
          {
            valorTotal = parseInt(valorTotal) + parseInt(j.valor);
            estado = "";

            btnPagar = "";

            if(j.estado=="A")
            {
              estado="<button class='btn btn-danger' style='width:100%' disabled>POR PAGAR</button>";
              btnPagar=`<button class='btn btn-success' onClick='pagarVenta(${j.correlativo})' >Pagar</button>`;
            }
            else
            {
              estado="<button class='btn btn-success' style='width:100%' disabled>PAGADO</button>";
              btnPagar=`<button class='btn btn-success' onClick='pagarVenta(${j.correlativo})' disabled>Pagar</button>`;
            }

            valor_formateado = formatearNumero("P",j.valor);
            template = template+
          `<tr>
              <td>${j.correlativo}</td>
              <td>${estado}</td>
              <td>${j.fecha}</td>
              <td>${valor_formateado}</td>
            <tr>`;
          }
        })
        if(template=="")
        {
          $("#bodyCuenta").html("<tr><td colspan=4>Sin resultados</td></tr>");
        }
        else
        {
          valorTotal_formateado = formatearNumero("P", valorTotal)
          template = template +
          `<tr>
            <td colspan=3><strong>Total:</strong></td>
            <td><strong>${valorTotal_formateado}</strong></td>
          </tr>`;
          $("#bodyCuenta").html(template);
        }
      }
    }
  )
}*/
