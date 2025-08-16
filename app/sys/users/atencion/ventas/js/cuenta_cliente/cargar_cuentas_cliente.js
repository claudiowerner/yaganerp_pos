
//descarga de datos
function descargarCuentasCliente(rut)
{
    return $.ajax(
        {
            url: "func_php/cuenta_cliente/cargar_cuentas_cliente.php",
            data: {"rut":rut},
            type: "POST",
            async: false
        }
    ).responseText;
}

//parseo de datos de cuentas de cliente
function parseoDatosCuentasCliente(rut)
{
    let template = "";
    let total = 0;
    let descarga = descargarCuentasCliente(rut);
    json = JSON.parse(descarga);
    if(Array.isArray(json))
    {
        if(json.length>0)
        {
            json.forEach(j=>{
                let corr = j.correlativo;
                total = parseInt(j.valor) + parseInt(total);
                template+=
                `<tr>
                    <td><input type='checkbox' class='checkbox' id='checkbox${corr}' onClick='checkboxPagarCuenta(${corr}, ${j.valor})'></td>
                    <td>${j.fecha}</td>
                    <td>${j.valor}</td>
                </tr>`;
            })
            template +=
            `<tr>
                <td align=right><span>Total: </span></td>
                <td><span id='totalCuentasCliente'>0</span><span> de </span><span>${total}</span></td>
                <td><button id='btnPagarCuentas' class='btn btn-primary' onclick='realizar_pago()' disabled>Pagar selección</button></td>
            </tr>`;
        }
        else
        {
            template = "<tr><td colspan=3>No posee cuentas pendientes</td></tr>";    
        }
    }
    else
    {
        template = "<tr><td>Ocurrió un error al obtener información</td></tr>";    
    }
    $("#bodyCuentas").html(template);
    
}