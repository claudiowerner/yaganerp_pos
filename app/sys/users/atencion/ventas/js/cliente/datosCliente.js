//funcion de descarga de datos
function descargarDatosCliente(rut)
{
    return $.ajax(
        {
            url:"func_php/cliente/busqueda_datos_cliente.php",
            data: {"rut": rut},
            type:"POST",
            async: false,
        }
    ).responseText;
}

//parseo de información
function parseoDatosCliente(rut)
{
    let template = "";
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
        let descarga = descargarDatosCliente(rut)
        json = JSON.parse(descarga);
        console.log(json);
        if(Array.isArray(json))
        {
            length = json.length;
            if(length>0)
            {
                $("#btnAgregarCliente").prop("disabled", true);
                json.forEach
                (c=>
                    {
                        template = template+
                        `<tr>
                            <td>${c.rut}</td>
                            <td>${c.nombre}</td>
                            <td>${c.apellido}</td>
                            <td>
                                <button class="btn btn-success"  style='margin: 2px' onClick=registrarCuenta('${c.rut}')>Seleccionar</button>
                            </td>
                        <tr>`;
                    }
                );
            }
            else
            {
                template = 
                `<tr>
                    <td colspan=4>Sin resultados</td>
                </tr>`;
                $("#btnAgregarCliente").prop("disabled", false);
            }
        }
    }
    $("#datosCliente").html(template);
}




$("#txtRut").on("keyup", function(e)
{
    let rut = $("#txtRut").val();
    parseoDatosCliente(rut);
})

