//DESCARGA VIA AJAX DE MOVIMIENTOS DE CAJA
function movimientoCaja()
{
    let turno = $("#id_caja").text();
    let datos = {
        "id_cierre": turno,
        "caja": nCaja
    }

    return $.ajax({
        url: "func_php/read_movimiento_caja",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}


//INSERCIÓN DE MOVIMIENTOS VIA AJAX
function insertarMovimiento()
{
    let turno = $("#id_caja").text();
    let movCaja = $("#txtMovimientoCaja").val();
    let datos = {
        "turno": turno,
        "caja": nCaja,
        "monto": movCaja
    }

    return $.ajax({
        url: "func_php/agregarMovimientoCaja.php",
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

$("#btnAgregarMovimiento").on("click", function(e)
{
    let movCaja = $("#txtMovimientoCaja").val();
    if(movCaja == "")
    {
        msjes_swal("Aviso", "Debe rellenar el campo numérico", "warning");
    }
    else
    {
        let insertar = insertarMovimiento();
        alert(insertar)
        if(insertar.match(/correctamente/))
        {
            msjes_swal("Excelente", insertar, "success");
        }
        if(insertar.match(/error/))
        {
            msjes_swal("Error", mostrar, "error")
        }
    }
    cargarMovimientoCaja();
});

$("#btnMovimientoCaja").on("click", function(e)
{
    $("#modalMovimientoCaja").modal("show");
    cargarMovimientoCaja();
})