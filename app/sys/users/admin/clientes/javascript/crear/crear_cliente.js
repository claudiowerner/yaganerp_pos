










//Acción de botón guardar
$("#btnGuardar").on("click",function(e)
{
    let rut = $("#txtRutClte").val();
    let nombre =$("#txtNombreClte").val();
    let apellido =$("#txtApellido").val();
    
    if(rut==""||nombre==""||apellido=="")
    {
        msjes_swal("Aviso", "Debe rellenar todos los campos", "warning")
    }
    else
    {
        let validarRut = fnValidarRut.validaRut(rut);
        if(validarRut)
        {
            //Se valida si ya existe el rut en la BD. Si el rut no existe, debería retornar valor 0
            let validarRutBD = validarRutEnBD(rut);
            if (validarRutBD!=0)
            {
                msjes_swal("Aviso", "Ya existe registro de un cliente con el rut "+rut, "warning");
            }
            else
            {
                crearCliente(rut, nombre, apellido);
            }
        }
        else
        {
            msjes_swal("Aviso", "Rut inválido", "warning");
        }
    }
});