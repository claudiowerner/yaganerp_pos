/* -------------------------------------------- FUNCION AJAX ------------------------------------------- */
function cargarDatosComandaAjax()
{
    return $.ajax({
        url:"script_php/info_cuentas/read_datos.php",
        type: "POST",
        async: false
    }).responseText;

}

/* -------------------------------------------- FUNCION DOM -------------------------------------------- */
function cargarDatosComanda()
{
    $("#txtNombreFantasia").val("");
    $("#txtRazonSocial").val("");
    $("#txtDireccion").val("");
    $("#txtCorreo").val("");
    $("#txtTelefono").val("");



    let descarga = cargarDatosComandaAjax();
    let json = JSON.parse(descarga);

    if(Array.isArray(json))
    {
        json.forEach(c=>{
            $("#txtNombreFantasia").val(c.nom_fantasia);
            $("#txtRazonSocial").val(c.razon_social);
            $("#txtDireccion").val(c.direccion);
            $("#txtCorreo").val(c.correo);
            $("#txtTelefono").val(c.telefono);
            $("#slctGiros").select(c.giro);
        })
    }
}