function enviarDatos(t,c,m)
{
    let datos = {
        "turno": t,
        "caja": c,
        "monto": m
    }
    return $.ajax({
        url: "func_php/confirmarMontoCajaInicial.php",
        data: datos,
        type: "POST", 
        async: false
    }).responseText;
}

$("#btnConfirmarMontoInicial").on("click", function()
{
    let montoInicial = $("#txtMontoInicialCaja").val();
    if(montoInicial == "")
    {
        msjes_swal("Aviso", "Debe indicar el monto inicial", "warning")
    }
    else
    {
        let monto = parseInt(montoInicial);
        if(monto<5000)
        {
            msjes_swal("Aviso", "El monto indicado debe ser mayor a $5000", "warning")
        }
        else
        {
            let turno = $("#id_caja").text();
            let mostrar = enviarDatos(turno, nCaja, monto)
            alert(mostrar)
        }
    }
})