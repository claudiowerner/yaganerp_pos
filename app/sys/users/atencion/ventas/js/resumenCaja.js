//descargar ID del turno abierto
function descargarIDTurno()
{
    return $.ajax({
        url: "func_php/cargarIDTurno.php",
        type: "POST",
        async: false
    }).responseText;
}

//descargar información de pagos
function descargarResumenCaja()
{
    let id = descargarIDTurno();
    let idCaja = $("#nCaja").text();
    return $.ajax({
        url: "func_php/read_resumen_caja.php",
        data: {"turno":id, "caja": idCaja},
        type: "POST",
        async: false
    }).responseText;
}


$("#btnResumen").on("click", function(e)
{
    $("#modalResumenCaja").modal("show");
    let descarga = descargarResumenCaja();
    let json = JSON.parse(descarga);
    let template = "";
    let valor = 0;
    json.forEach(j=>
        {
            valor = parseInt(valor) + parseInt(j.valor);
            template = template + `<tr><td align=right>${j.metodo_pago}</td><td>$${j.valor}</td></tr>`
        })
    template = template +`<tr><td align=right><strong>TOTAL:</strong></td><td><strong>$${valor}</strong></td></tr>`;
    $("#bodyResumenCaja").html(template);
});