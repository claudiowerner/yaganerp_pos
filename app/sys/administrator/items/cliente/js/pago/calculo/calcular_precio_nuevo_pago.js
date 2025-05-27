/* ------------------------------------------- FUNCTION AJAX ------------------------------------------------------- */
function descargarValorPlanAjax(id_plan)
{
    return $.ajax({
        url: "php/cliente/pagos/read_precio_plan_plazo_pago.php",
        data: {"id_plan": id_plan},
        type: "POST",
        async: false
    }).responseText;
}

/* ------------------------------------------- FUNCTION DOM -------------------------------------------------------- */
function calcularPrecioNuevoPago()
{
    //obtener ID y valor del plan
    let id_plan = $("#slctPlanContratado").val();
    let descargarValorPlan = descargarValorPlanAjax(id_plan);

    //obtener id del periodo seleccionado
    let id_periodo = $("#slctPeriodoPago").val();


    try
    {
        //convertir respuesta del script PHP a JSON
        let j = JSON.parse(descargarValorPlan);
        let valorPlan = j.valor;
        
        //Cálculo de valor resultante entre el valor del plan y periodo de pago seleccionado
        let valor_total = valorPlan * id_periodo;

        //formateo de valores
        let valorPlanFormateado = formatearNumero("P", valorPlan);
        let valorTotalFormateado = formatearNumero("P", valor_total);


        //impresión en pantalla
        $("#lblValorPlan").html(valorPlanFormateado);
        $("#lblMesSeleccionado").html(id_periodo);
        $("#lblPrecioTotal").html(valorTotalFormateado);
        
    }
    catch(e)
    {
        console.error(e.responseText);
    }
    
}

function calcularPrecioPagoEditado()
{
    //obtener ID y valor del plan
    let id_plan = $("#slctPlanContratadoEditar").val();
    let descargarValorPlan = descargarValorPlanAjax(id_plan);

    //obtener id del periodo seleccionado
    let id_periodo = $("#slctPeriodoPagoEditar").val();


    try
    {
        //convertir respuesta del script PHP a JSON
        let j = JSON.parse(descargarValorPlan);
        let valorPlan = j.valor;
        
        //Cálculo de valor resultante entre el valor del plan y periodo de pago seleccionado
        let valor_total = valorPlan * id_periodo;

        //formateo de valores
        let valorPlanFormateado = formatearNumero("P", valorPlan);
        let valorTotalFormateado = formatearNumero("P", valor_total);


        //impresión en pantalla
        $("#lblValorPlanEditar").html(valorPlanFormateado);
        $("#lblMesSeleccionadoEditar").html(id_periodo);
        $("#lblPrecioTotalEditar").html(valorTotalFormateado);
        
    }
    catch(e)
    {
        console.error(e.responseText);
    }
    
}