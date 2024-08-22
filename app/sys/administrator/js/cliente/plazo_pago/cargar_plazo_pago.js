/* ----------------------------------------- FUNCIONES AJAX -------------------------------------------*/
function descargarPlazosPagoAjax()
{
    return $.ajax({
        url: "php/cliente/plazo_pago/cargar_plazo_pago.php",
        type: "POST",
        async: false
    }).responseText;
}


/* ----------------------------------------- FUNCIONES DOM ------------------------------------------- */

cargarPlazosPago();
function cargarPlazosPago()
{
    let descarga = descargarPlazosPagoAjax();
    let json = JSON.parse(descarga);
    let template = "";
    if(Array.isArray(json))
    {
        json.forEach(j=>{
            template += `<option value=${j.meses}>${j.nombre_plazo}</option>`;
        })
    }
    else
    {
        template += `<option value=${j.meses}>${j.nombre_plazo}</option>`;
    }
    $("#slctPlazoPago").html(template);
    $("#slctPlazoPagoEditar").html(template);
    $("#slctPeriodoPago").html(template);
}
