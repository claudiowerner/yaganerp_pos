/* ------------------------------------------ FUNCIONES AJAX ----------------------------------------- */
function actualizarDatosCuentaAjax(datos)
{
    return $.ajax({
        url:"script_php/info_cuentas/actualizar_datos.php",
        data: datos,
        type: "POST",
        async: false,
    }).responseText;
}
/* ------------------------------------------ FUNCIONES DOM ------------------------------------------ */
$("#btnGuardarCambiosCuenta").on("click", function(e)
{
    let nomFantasia = $("#txtNombreFantasia").val();
    let razonSocial = $("#txtRazonSocial").val();
    let direccion = $("#txtDireccion").val();
    let correo = $("#txtCorreo").val();
    let telefono = $("#txtTelefono").val();
    let giro = $("#slctGiros").val();

    if(nomFantasia!=""&&razonSocial!=""&&direccion!=""&&correo!=""&&telefono!="")
    {
        valCorreo = validarCorreo(correo);
        valNumero = validarTelefono(telefono);

        
        if(valCorreo&&valNumero)
        {
            datos = {
                "nom_fantasia":nomFantasia,
                "razon_social":razonSocial,
                "direccion":direccion,
                "correo": correo,
                "telefono": telefono,
                "giro": giro
            };
            
            let actualizar = actualizarDatosCuentaAjax(datos);
            let json = JSON.parse(actualizar);

            msjes_swal(json.titulo, json.mensaje, json.icono);

            if(json.editar_datos)
            {
                $("#modalConfCuenta").modal("hide");
                cargarDatosComanda();
            }
        }
        else
        {
            if(!valCorreo)
            {
                msjes_swal("Aviso", "El correo ingresado no es válido", "warning");
            }
            if(!valNumero)
            {
                msjes_swal("Aviso", "El teléfono ingresado no es válido", "warning");
            }
        }
    }

})
