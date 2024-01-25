function cargarNumeroVenta()
{
    let cierre = $("#id_caja").text();
    let datos = { 
        "caja": nCaja,
        "id_cierre": cierre
    }
    return $.ajax({
        url: "func_php/comprobarPrimeraVenta.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}
$(document).ready(function()
{
    let numeroVenta = cargarNumeroVenta();
    if(numeroVenta<1)
    {
        $("#modalCajaInicial").modal("show");
    }
})