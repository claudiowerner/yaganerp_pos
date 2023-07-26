

$("#txtRut").on("keyup", function(e)
{
    let rut = $("#txtRut").val();
    template = "";
    if(rut=="")
    {
        template = 
        `<tr>
            <td colspan=4 align=center>
                Indique un parámetro de búsqueda
            </td>
        </tr>`;
    }
    else
    {
        $.ajax(
            {
                url:"func_php/busqueda_datos_cliente.php",
                data: {"rut": rut},
                type:"POST",
                async: false,
                success: function(e)
                {
                    try
                    {
                        json = JSON.parse(e);
                        json.forEach
                        (c=>
                            {
                                template = template+
                                `<tr>
                                    <td>${c.rut}</td>
                                    <td>${c.nombre}</td>
                                    <td>${c.apellido}</td>
                                    <td>
                                        <button class="btn btn-success" onClick=registrarCuenta('${c.rut}')>Seleccionar</button>
                                    </td>
                                <tr>`;
                            }
                        );
                        $("#btnAgregarCliente").prop("disabled", true);
                    }
                    catch(e)
                    {
                        template = 
                        `<tr>
                            <td colspan=4>Sin resultados</td>
                        </tr>`;
                        $("#btnAgregarCliente").prop("disabled", false);
                    }
                }
            }
        )
    }
    $("#datosCliente").html(template);
})

function registrarCuenta(rut)
{

    let correlativo = $("#id_venta").text();
    let fecha = getFechaBD();
    
    let datos = {
        "rut":rut,
        "corr": correlativo,
        "fecha": fecha
    }
    //se pregunta si desea añadir la venta a la cuenta del cliente seleccionado

    swal({
        title: "¿Seguro?",
        text: 
        `¿Desea agregar esta venta a la cuenta de este cliente ${rut}?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((pagar) => {
        if (pagar)
        {
            //insertar datos en tabla cuenta_corriente
            $.ajax({
                url:"func_php/agregar_registro_cuenta.php",
                data:datos,
                type: "POST",
                success: function(e)
                {
                    swal({
                        title:"Excelente",
                        text:e,
                        icon:"success"
                    })
                }
            })
            .fail(function(e)
            {
                swal({
                    title:"Error",
                    text:e,
                    icon:"error"
                })
            })
        } 
        else 
        {
            swal("Operación cancelada");
        }
      });

    /**/

}