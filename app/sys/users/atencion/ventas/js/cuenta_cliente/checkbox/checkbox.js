

//array que carga 
let arrayPagarTotalCuentas = new Array();
function checkboxPagarCuenta(id_cuenta, valor)
{
    /* ----------------------------------SUMA DE VALORES PARA IMPRIMIR EN PANTALLA ----------------------*/
    

    /*se verifica si el checkbox en cuestión se ha checkeado o no */
    let check_particular = $("#checkbox"+id_cuenta).is(":checked");
    let calculo = sumarRestarValor(check_particular, valor)
    $("#totalCuentasCliente").html(calculo);


    /*verificar que uno o mas checkbox estén checkeados para habilitar el botón de pago total */
    grupoCheckboxCheckeado();

    /*agregar los ID de las cuentas al array de cuentas */
    agregarIdAlArray(check_particular, id_cuenta)
}


function sumarRestarValor(check_particular, valor)
{
    let total_valor = $("#totalCuentasCliente").text();
    let valor_seleccionado = 0;
    if(check_particular)
    {
        //suma de todos los valores seleccionados
        valor_seleccionado = parseInt(total_valor) + parseInt(valor);
    }
    else
    {
        //resta de todos los valores seleccionados
        valor_seleccionado = parseInt(total_valor) - parseInt(valor);   
    }
    return valor_seleccionado;
}

function agregarIdAlArray(check_particular, id_cuenta)
{
    if(check_particular)
    {
        //agregar elementos al arrayPagarTotalCuentas
        arrayPagarTotalCuentas.push(id_cuenta);
    }
    else
    {
        //eliminar elementos del arrayPagarTotalCuentas
        arrayPagarTotalCuentas = arrayPagarTotalCuentas.filter(animal=>animal!=id_cuenta);
    }
    arrayPagarTotalCuentas = arrayPagarTotalCuentas.sort();
}


function grupoCheckboxCheckeado(id_cuenta)
{
    //se verifica si uno o mas checkbox están checkeados
    let check_grupo = $(".checkbox").is(":checked");
    

    if(check_grupo)
    {
        //activar botón de pago del total de cuentas
        $("#btnPagarTotalCuentas").prop("disabled", false);

    }
    else
    {
        //desactivar botón de pago del total de cuentas
        $("#btnPagarTotalCuentas").prop("disabled", true);
    }
}