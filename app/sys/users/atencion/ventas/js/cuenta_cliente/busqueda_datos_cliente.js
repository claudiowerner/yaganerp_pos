

function descargaDatosClienteBusqueda(rut)
{
    return $.ajax({
        url: "func_php/cliente/busqueda_datos_cliente.php",
        data: {"rut": rut},
        type: "POST",
        async: false, 
    }).responseText;
}

///parseo e impresión de los datos del cliente
function parseoDatosClienteBusqueda(rut)
{
    let template = ""
    if(rut=="")
    {
        template = 
        `<tr align="center">
            <td colspan=4>Ingrese un parámetro de búsqueda</td>
        </tr>`;
        $("#datosClientePagarCuenta").html(template)
    }
    else
    {
        let descarga = descargaDatosClienteBusqueda(rut);
        let json = JSON.parse(descarga);

        let largo = json.length;
        
        if(largo>0)
        {
            json.forEach(j=>
                {
                    template +=
                    `<tr>
                        <td>${j.rut}</td>
                        <td>${j.nombre}</td>
                        <td>${j.apellido}</td>
                        <td><button onClick='selecCliente("${j.rut}")' style='margin: 2px'  class='btn btn-success'>Seleccionar</button></td>
                    </tr>`;
                }
            );
        }
        else
        {
            template +=
            `<tr>
                <td colspan=4>No se encontraron resultados.</td>
            </tr>`;
        }"W"
    }
    $("#datosClientePagarCuenta").html(template)
}


$("#txtBuscarCliente").on("keyup", function(e)
{
    let rut = $("#txtBuscarCliente").val();
    parseoDatosClienteBusqueda(rut);
})