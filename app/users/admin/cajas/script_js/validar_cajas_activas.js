function validarCajasActivas()
{
    let cajas_c = parseInt($("#cajas_creadas").text());
    let cajas_p = parseInt($("#cajas_permitidas").text());

    if(cajas_c==cajas_p||cajas_c>cajas_p)
    {
        $("#btnAgregarCaja").prop("disabled", true);
    }
    else
    {
        $("#btnAgregarCaja").prop("disabled", false);
    }
}