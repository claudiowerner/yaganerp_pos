

//función de guardar información en la BD
function crearCliente(rut, nombre, apellido)
{
    datos = {
        "rut": rut,
        "nombre": nombre,
        "apellido": apellido,
        "fecha": getFechaBD()
    }
    return $.ajax({
        url:"funciones/crear_cliente.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}







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
                let registro = crearCliente(rut, nombre, apellido);
                let json = JSON.parse(registro);

                msjes_swal(json.titulo, json.mensaje, json.icono);

                //si se hizo el registro correctamente
                if(json.registro)
                {
                    $("#modalRegistro").modal("hide");
                    $("#producto").DataTable().ajax.reload();
                }
            }
        }
        else
        {
            msjes_swal("Aviso", "Rut inválido", "warning");
        }
    }
});