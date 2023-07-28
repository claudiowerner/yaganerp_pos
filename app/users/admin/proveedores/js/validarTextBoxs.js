function validarTextBoxs()
{
    let nombre = $("#txtNombreProveedor").val();
    if(nombre=="")
    {
        $("#lblRutValido").html("Debe rellenar todos los campos");
        $("#lblRutValido").css("color", "red");
        $("#btnGuardar").prop("disabled", true)
    }
    else
    {
        $("#lblRutValido").html("OK");
        $("#lblRutValido").css("color", "green");
        $("#btnGuardar").prop("disabled", false)
    }
}