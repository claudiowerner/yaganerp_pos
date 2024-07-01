
function confirmarPagaCuenta(array)
{
    let nCaja = $("#nCaja").text();
    let idCaja = $("#id_caja").text();
    let formaPago = $("#metodoPagoCuenta").val();
    nomCaja = $("#nomCaja").text();

    let datos = {
        "nCaja": nCaja,
        "fecha": getFechaBD() +" "+ getHora(),
        "idCaja": idCaja,
        "formaPago": formaPago,
        "array_correlativo": array,
        "id_turno": idCaja,
    }
    return $.ajax({
        url: "func_php/pagos/pagar_cuentas.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
  
}
