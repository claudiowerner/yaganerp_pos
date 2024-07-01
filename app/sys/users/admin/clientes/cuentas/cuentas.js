
let rut = $("#rut").text()
let fechaInicio = "";
let fechaFin = "";

cargarNombreCliente(rut);
cargarDatos(rut, fechaInicio, fechaFin);

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

function cargarDatos(rut, fechaInicio, fechaFin)
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
}


function getFechaBD()
{
  var hoy = new Date();
  //fecha
  let dia = hoy.getDate();
  let mes = parseInt(hoy.getMonth())+parseInt(1);
  let ano = hoy.getFullYear();
  if(dia<10)
  {
    dia = "0"+hoy.getDate();
  }
  if(mes<10)
  {
    mes = "0"+mes;
  }
  var fecha = ano+"-"+mes+"-"+dia;
  return fecha;
}

