/* ---------------------------------------------- FUNCIONES AJAX -------------------------------------- */
function cargarValorPlan(id)
{
    return $.ajax({
        url: "php/cliente/resumen_pago/cargar_precio_plan.php",
        data: {"id_plan": id},
        type: "POST",
        async: false
    }).responseText;
}

/* ----------------------------------------------- FUNCIONES DOM -------------------------------------- */
calcularPago();
function calcularPago()
{
    let plan_comprado = $("#slctPlan").val();
    let meses = $("#slctPlazoPago").val();
    let valor_plan = cargarValorPlan(plan_comprado)
    let valor_plan_formateado = formatearNumero("P", valor_plan);

    let valor_total = valor_plan * meses;
    let valor_total_formateado = formatearNumero("P", valor_total);


    $("#valorPlan").html(valor_plan_formateado);
    $("#mesesSeleccionados").html(meses);
    $("#valorTotal").html(valor_total_formateado);
}