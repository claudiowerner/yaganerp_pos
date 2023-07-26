

$("#txtRutGuardar").on("keyup", function(e)
{
    let rut = $("#txtRutGuardar").val()
    let valRut = fnValidarRut.validaRut(rut);

    lblRutValido(valRut);
})

$("#txtNombreGuardar").on("keyup", function(e)
{
    validarTextBoxs();
});

$("#txtApellidoGuardar").on("keyup", function(e)
{
    validarTextBoxs();
});

$("#btnGuardarCliente").on("click", function(e)
{
    let rut = $("#txtRutGuardar").val();
    let nombre = $("#txtNombreGuardar").val();
    let apellido = $("#txtApellidoGuardar").val();

    let fecha = getFechaBD();

    let datos = {
        "rut":rut,
        "nombre": nombre,
        "apellido": apellido,
        "fecha": fecha
    }

    swal({
        title: "¿Está seguro?",
        text: `Rut:${rut}\nNombre: ${nombre}\nApellido: ${apellido}`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((pagar) => {
        if (pagar)
        {
            $.ajax({
                url: "func_php/agregar_cliente.php",
                data: datos,
                type: "POST",
                success: function(e)
                {
                    swal({
                        title:"Excelente",
                        text: e,
                        icon: "success"
                    })
                }
            })
            .fail(function(e)
            {
                swal({
                    title:"Error",
                    text:e.responseText,
                    icon:"error"
                })
                $("#modalAgregarCliente").modal("show");
            })
        }
        else 
        {
            $("#modalAgregarCliente").modal("show");
        }
    });
})


function validarTextBoxs()
{
    let nombre = $("#txtNombreGuardar").val();
    let apellido = $("#txtApellidoGuardar").val();
    if(nombre==""||apellido=="")
    {
        $("#lblRutValido").html("Debe rellenar todos los campos");
        $("#lblRutValido").css("color", "red");
        $("#btnGuardarCliente").prop("disabled", true)
    }
    else
    {
        $("#lblRutValido").html("OK");
        $("#lblRutValido").css("color", "green");
        $("#btnGuardarCliente").prop("disabled", false)
    }
}