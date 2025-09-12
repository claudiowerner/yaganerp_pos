function contar_caracteres()
{
    let caracteres = $("#txtSugerencia").val();
    let c = caracteres.length;
    $("#caract").html(c);

    if(c==0)
    {
        $("#btnEnviarSugerencia").prop("disabled", true)
    }
    else
    {
        $("#btnEnviarSugerencia").prop("disabled", false)
    }
}