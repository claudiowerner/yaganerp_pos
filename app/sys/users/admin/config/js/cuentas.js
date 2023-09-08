
cargarDatosComanda();

$("#btnGuardarCambiosCuenta").on("click", function(e)
{
    let nomFantasia = $("#txtNombreFantasia").val();
    let razonSocial = $("#txtRazonSocial").val();
    let direccion = $("#txtDireccion").val();
    let correo = $("#txtCorreo").val();
    let telefono = $("#txtTelefono").val();
    let giro = $("#slctGiros").val();

    if(nomFantasia=="")
    {
        $("#errorNomFantasia").html("Debe rellenar este campo");
    }
    if(nomFantasia!="")
    {
        $("#errorNomFantasia").html("");
    } 
    if(razonSocial=="")
    {
        $("#errorRazonSocial").html("Debe rellenar este campo");
    }
    if(razonSocial!="")
    {
        $("#errorRazonSocial").html("");
    } 

    
    if(direccion=="")
    {
        $("#errorDireccion").html("Debe rellenar este campo");
    }
    if(direccion!="")
    {
        $("#errorDireccion").html("");
    } 
    if(correo=="")
    {
        $("#errorCorreo").html("Debe rellenar este campo");
    }
    if(correo!="")
    {
        $("#errorCorreo").html("");
    } 

    if(telefono=="")
    {
        $("#errorTelefono").html("Debe rellenar este campo");
    }
    if(telefono!="")
    {
        $("#errorTelefono").html("");
    }

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
            $.ajax(
                {
                    url:"info_cuentas/actualizar_datos.php",
                    data: datos,
                    type: "POST",
                    success: function(e)
                    {
                        msjes_swal("Excelente", e, "success");
                        $("#modalConfCuenta").modal("hide");
                        cargarDatosComanda();
                    }
                }
            )
            .fail(function(e)
            {
                console.log("Error al actualizar los datos: "+e.responseText);
            })
        }
        else
        {
            if(!valCorreo)
            {
                $("#errorCorreo").html("Correo no válido");
            }
            if(!valNumero)
            {
                $("#errorTelefono").html("Número no válido");
            }
        }
    }

})



//funcion que carga los datos de la comanda 
function cargarDatosComanda()
{
    $("#txtNombreFantasia").val("");
    $("#txtRazonSocial").val("");
    $("#txtDireccion").val("");
    $("#txtCorreo").val("");
    $("#txtTelefono").val("");



    $.ajax(
        {
            url:"info_cuentas/read_datos.php",
            type: "POST",
            success: function(e)
            {
                json = JSON.parse(e);

                if(Array.isArray(json))
                {
                    json.forEach(c=>
                        {
                            $("#txtNombreFantasia").val(c.nom_fantasia);
                            $("#txtRazonSocial").val(c.razon_social);
                            $("#txtDireccion").val(c.direccion);
                            $("#txtCorreo").val(c.correo);
                            $("#txtTelefono").val(c.telefono);
                            $("#slctGiros").val(c.giro);
                        })
                }
                /**/
            }
        }
    )
}






//funcion que valida el correo electrónico
function validarCorreo(cadena) {
    // Expresión regular para validar un correo electrónico
    var patron = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  
    // Validar el correo electrónico usando la expresión regular
    if (patron.test(cadena))
    {
        return true;
    } 
    else
    {
        return false;
    }
}

//funcion que valida el número de teléfono ingresado

function validarTelefono(numeroTelefono) {
    // Expresión regular para validar un número de teléfono en formato internacional
    var patron = /^\+[1-9]\d{0,2}\s?\d{3,4}\s?\d{4}$/;
  
    // Validar el número de teléfono usando la expresión regular
    if (patron.test(numeroTelefono)) 
    {
        return true;
    }
    else
    {
        return false;
    }
}

  