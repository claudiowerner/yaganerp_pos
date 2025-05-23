/* ----------------------------------------------------- FUNCION AJAX ------------------------------------------------- */
//INSERTAR MOVIMIENTO DESDE MODAL DE MOVIMIENTOS
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
        url: "func_php/caja_dinero/agregarMovimientoCaja.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}
//INSERTAR MOVIMIENTO DESDE MÉTODO DE PAGO

function insertarMovimientoPago(turno, nCaja, movCaja)
{
    let datos = {
        "turno": turno,
        "caja": nCaja,
        "monto": movCaja
    }

    return $.ajax({
        url: "func_php/caja_dinero/agregarMovimientoCaja.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}


/* ------------------------------------------------------ FUNCION DOM -------------------------------------------------- */

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