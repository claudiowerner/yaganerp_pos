

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
                url:"func_php/cliente/busqueda_datos_cliente.php",
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

