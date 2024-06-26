
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
    json.forEach(j=>
        {
            let corr = j.correlativo;
            total = parseInt(j.valor) + parseInt(total);
            template+=
            `<tr>
                <td><input type='checkbox' class='checkbox' id='checkbox${corr}' onClick='checkboxPagarCuenta(${corr}, ${j.valor})'></td>
                <td>${j.fecha}</td>
                <td>${j.valor}</td>
                <td><button class='btn btn-success' onClick='pagar(${j.correlativo})'>Pagar</button></td>
            </tr>`;
        }
    )
    template +=
    `<tr>
        <td align=right colspan=2><span>Total: </span></td>
        <td><span id='totalCuentasCliente'>0</span><span> de </span><span>${total}</span></td>
        <td><button id='btnPagarTotalCuentas' class='btn btn-primary' onclick='realizar_pago()' disabled>Pagar selección</button></td>
    </tr>`;
    $("#bodyCuentas").html(template);
}