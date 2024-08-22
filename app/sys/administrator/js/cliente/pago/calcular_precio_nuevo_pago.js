/* ------------------------------------------- FUNCTION AJAX ------------------------------------------------------- */
function valorPlanAjax(id_cl)
{
    return $.ajax({
        url: "php/planes/read_precio_plan.php",
        data: {"id_cl": id_cl},
        type: "POST",
        async: false
    }).responseText;
}

/* ------------------------------------------- FUNCTION DOM -------------------------------------------------------- */
function calcularPrecioNuevoPago()
{
    let id_cl = $("#idClientePago").text();
    let valorPlan = valorPlanAjax(id_cl);
    alert(valorPlan);
    
}