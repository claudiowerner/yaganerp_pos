//descargar años de compra(desde el año en que el cliente tuvo su primera venta)
function descargarMesCompra(año)
{
    return $.ajax(
        {
            url: "func_php/imprimir/mes_boleta/mes_boleta.php",
            data: {"año": año},
            type: "POST",
            async: false
        }
    ).responseText;
}

//parseo y muestra de datos en pantalla
function mesesVenta(año)
{
    $("#modalAñoBoleta").modal("hide");
    $("#modalMesBoleta").modal("show");
    let descargarMes = descargarMesCompra(año);
    let template = "";
    let mes_actual;

    let json = JSON.parse(descargarMes);


    if(Array.isArray(json))
        {
            json.forEach(j=>
                {
                    if(j.mes_actual)
                    {
                        mes_actual = "btn btn-primary";
                    }
                    else
                    {
                        mes_actual = "btn btn-secondary";
                    }
                    template += `<button class='${mes_actual}'onClick=calendario(${año},${j.nro_mes})><h1>${j.mes}</h1></button>`;
                }
            )
        };
    
    $("#mesBoleta").html(template);
}