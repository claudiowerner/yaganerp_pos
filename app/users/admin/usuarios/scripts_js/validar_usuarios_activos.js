function validarUsuariosActivos()
{
    let us_c = parseInt($("#us_creados").text());
    let us_p = parseInt($("#us_permitidos").text());

    if(us_c==us_p||us_c>us_p)
    {
        $("#btnAgregarUsuario").prop("disabled", true);
    }
    else
    {
        $("#btnAgregarUsuario").prop("disabled", false);
    }
}