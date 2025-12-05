/* ESTE SCRIPT SE ENCARGA DE OBTENER LA INFORMACIÓN DEL SCRIPT PHP QUE VERIFICA 
SI EXISTE UNA VENTA ABIERTA PARA PODER CERRAR O NO LA CAJA */

function validar_ventas_activas()
{
    const n_caja = $("#nCaja").text();
    const turno = $("#id_caja").text();
    const corr = $("#id_venta").text();
    let datos = {
        "caja": n_caja,
        "turno": turno,
        "corr": corr
    }
    return $.ajax({
        url: "func_php/caja_atencion/validar_ventas_activas.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}