/* ------------------------------------------------- FUNCION AJAX ---------------------------------------------- */
function validarPagoEnUso(id_cl, id_periodo)
{
    let datos = {
        "id_cl": id_cl,
        "id_periodo": id_periodo
    };
    return $.ajax({
        url: "php/cliente/comprobante/validar_pago_en_uso.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}