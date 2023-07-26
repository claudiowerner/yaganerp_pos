function lblRutValido(valRut)
{
    if(valRut)
    {
        $("#lblRutValido").html("El rut es válido");
        $("#lblRutValido").css("color", "green");
        $("#btnGuardarCliente").prop("disabled", false)
        validarTextBoxs();
    }
    else
    {
        //
        $("#lblRutValido").html("El rut no es válido");
        $("#lblRutValido").css("color", "red");
        $("#btnGuardarCliente").prop("disabled", true)
    }
}