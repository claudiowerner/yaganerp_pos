/* ------------------------------------------ FUNCIONES AJAX ---------------------------------------- */
function cargarMargenGananciaAjax()
{
    return $.ajax({
        url: "script_php/config_margen_ganancia/read_margen_ganancia.php",
        type: "POST",
        async: false
    }).responseText;
}


/* ------------------------------------------ FUNCIONES DOM ----------------------------------------- */
function cargarMargenGanancia()
{
    let margenGanancia = cargarMargenGananciaAjax()
    let resp = parseFloat(margenGanancia);
    let porcentaje = parseFloat(resp*100);
    $("#txtMargenGanancia").val(porcentaje);
}