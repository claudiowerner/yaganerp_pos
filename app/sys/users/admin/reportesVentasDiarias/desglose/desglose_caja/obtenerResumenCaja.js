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
json.forEach(j=>{
  valor = parseInt(j.valor) + parseInt(valor);
  template += `<tr><td><strong>${j.metodo_pago}</strong></td><td>${j.cant_transac}</td><td>$${j.valor}</td></tr>`;
});

template += `<tr><td colspan=2><strong>TOTAL:</strong></td><td>$${valor}</td></tr>`;
$("#formaPago").html(template);