function validarUsuariosActivos()
{
    let us_c = parseInt($("#us_creados").text());
    let us_p = parseInt($("#us_permitidos").text());
    let msje = "";
    if(us_c==us_p||us_c>us_p)
    {
        $("#btnAgregarUsuario").prop("disabled", true);
        msje = "Cuota de usuarios activados alcanzada ("+us_p+")";
    }
    else
    {
        $("#btnAgregarUsuario").prop("disabled", false);
        msje = "";
    }
    $("#msjeUsuariosActivos").html(msje);
}