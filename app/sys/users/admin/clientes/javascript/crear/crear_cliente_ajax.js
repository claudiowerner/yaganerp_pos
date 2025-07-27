//función de guardar información en la BD
function crearCliente(rut, nombre, apellido)
{
    datos = {
        "rut": rut,
        "nombre": nombre,
        "apellido": apellido,
        "fecha": getFecha()
    }
    $.ajax({
        url:"funciones/crear_cliente.php",
        data: datos,
        type: "POST",
        beforeSend: function()
        {
            $("#btnGuardar").html("Procesando...");
            $("#btnGuardar").prop("disabled", true);
        },
        success: function(e)
        {
            let json = JSON.parse(e);
            
            msjes_swal(json.titulo, json.mensaje, json.icono);
            
            //si se hizo el registro correctamente
            if(json.registro)
            {
                $("#modalRegistro").modal("hide");
                $("#producto").DataTable().ajax.reload();
                $("#btnGuardar").html("Guardar");
                $("#btnGuardar").prop("disabled", false);
            }
        }
    });
}