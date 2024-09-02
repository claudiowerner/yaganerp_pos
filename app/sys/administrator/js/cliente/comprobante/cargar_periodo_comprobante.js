

/* --------------------------------------------- FUNCTION AJAX ----------------------------------------------------- */
function cargarPeriodosComprobanteAjax(id)
{
    return $.ajax({
        url: "php/cliente/comprobante/cargar_periodo_comprobante.php",
        data: {"id_cl": id},
        type: "POST", 
        async: false
    }).responseText;
}


/* --------------------------------------------- FUNCTION DOM ------------------------------------------------------ */
function cargarPeriodosComprobante(id)
{
    let template = "<option value=0>SELECCIONE UNA OPCIÓN</option>";
    let periodos = cargarPeriodosComprobanteAjax(id);
    let j = JSON.parse(periodos);

    if(Array.isArray(j))
    {
        j.forEach(j=>{
            template += `<option value=${j.id}>${j.periodos}</option>`;
        })
    }
    else
    {
        template = `<option value=0>Sin periodos disponibles</option>`;
    }
    $("#slctPeriodoComprobante").html(template);
}