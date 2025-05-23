function movimientoCaja()
{
    let turno = $("#id_caja").text();
    let datos = {
        "id_cierre": turno,
        "caja": nCaja
    }

    return $.ajax({
        url: "func_php/caja_dinero/read_movimiento_caja.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}

function cargarMovimientoCaja()
{
    let descarga = movimientoCaja();
    let json = JSON.parse(descarga);
    let template = "";
    let valor = 0;
    json.forEach(j=>
        {
            valor = parseInt(valor) + parseInt(j.monto);
            template+=`<tr><td>${j.n_op}</td><td>${j.descripcion}</td><td>$${j.monto}</td></tr>`;
        })
    template+=`<tr><td colspan=2><strong>Total en caja:</strong></td><td><strong>$${valor}</strong></td></tr>`;
    $("#bodyMovimientoCaja").html(template);
}


$("#btnMovimientoCaja").on("click", function(e)
{
    $("#modalMovimientoCaja").modal("show");
    cargarMovimientoCaja();
})