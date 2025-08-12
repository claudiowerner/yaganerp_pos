$(document).ready(function(e)
{
    let idv = $("#id_venta").text();//obtener ID de venta
    let idc = $("#id_caja").text();//obtener ID caja

    let datos = {
        "idv": idv,
        "idc": idc
    };
    $.ajax({
        url: "script_php/leer_detalle.php",
        data: datos,
        type: "POST",
        success: function(e)
        {
            let json = JSON.parse(e);
            let template = "";
            let precio_f = 0;
            let cant = 0;
            let precio = 0;
            let valor_total = 0;
            let valor_total_f = 0;
            let total = 0;
            let total_f = 0;
            json.forEach(j=>{
                precio = j.valor;
                cant = j.cantidad;
                valor_total = cant*precio;
                total = total + valor_total;
                precio_f = formatearNumero("P", precio);
                valor_total_f = formatearNumero("P", valor_total);
                template += 
                `<tr>
                    <td>${j.nombre_prod}</td>
                    <td>${j.estado_venta}</td>
                    <td>${precio_f}</td>
                    <td>${cant}</td>
                    <td>${valor_total_f}</td>
                </tr>`;
            });
            total_f = formatearNumero("P", total);
            template +=
            `<tr>
                <td colspan=4>
                    <strong style="text-align: right">Total:</strong>
                </td>
                <td>${total_f}</td>
            </tr>`;
            $("#bodyCuenta").html(template);
        }
    })
})