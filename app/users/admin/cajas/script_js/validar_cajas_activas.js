function validarCajasActivas()
{
    let cajas_c = parseInt($("#cajas_creadas").text());
    let cajas_p = parseInt($("#cajas_permitidas").text());
    let msje = "";

    if(cajas_c==cajas_p||cajas_c>cajas_p)
    {
        $("#btnAgregarCaja").prop("disabled", true);
        msje = "Cuota de cajas activadas alcanzada ("+cajas_p+")";
    }
    else
    {
        $("#btnAgregarCaja").prop("disabled", false);
        msje = "";
    }
    $("#msjeCajasActivas").html(msje);
}