//obtener nombre y desglose de la caja
let n_caja = $("#nCaja").text();
let id_cierre = $("#idCierre").text();

let datos_consulta = {
  "turno":id_cierre,
  "caja":n_caja
}

function descargarDatos(datos)
{
  return $.ajax({
    url: "read_resumen_caja.php",
    data: datos,
    type: "POST",
    async: false
  }).responseText;
}

let descarga = descargarDatos(datos_consulta);
let json = JSON.parse(descarga);
let template = ""; 
let valor = 0;
let cant_transac= 0;
json.forEach(j=>{
  let valor_formateado = 0;
  if (j.valor == 0)
  {
    valor = 0;
  }
  {
    valor = parseInt(j.valor);
  }
  valor_formateado = formatearNumero("P",valor);
  cant_transac = parseInt(j.cant_transac) + parseInt(cant_transac);
  template += 
  `<tr><td><strong>${j.metodo_pago}</strong></td><td>${j.cant_transac}</td><td>${valor_formateado}</td></tr>`;
});

$("#formaPago").html(template);