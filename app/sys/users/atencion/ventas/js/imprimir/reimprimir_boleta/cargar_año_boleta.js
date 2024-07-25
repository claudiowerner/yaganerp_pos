//descargar años de compra(desde el año en que el cliente tuvo su primera venta)
function descargarAñosCompra()
{
    return $.ajax(
        {
            url: "func_php/imprimir/año_boleta/año_boleta.php",
            type: "POST",
            async: false
        }
    ).responseText;
}

//parseo y muestra de datos en pantalla
function parseoImpresion()
{
    let descargaAños = descargarAñosCompra();
    let json = JSON.parse(descargaAños);
    let template = "";
    let clase_año_en_curso;

    if(Array.isArray(json))
    {
        json.forEach(j=>
            {
                if(j.año_en_curso)
                {
                    clase_año_en_curso = "btn btn-primary";
                }
                else
                {
                    clase_año_en_curso = "btn btn-secondary";
                }
                template += `<button class='${clase_año_en_curso}' style="margin-right: 2px;margin-bottom: 5px" onClick=mesesVenta(${j.año})><h1>${j.año}</h1></button>`;
            }
        )
    };
    $("#añoBoleta").html(template);
}



//acción botón mostrar modal del año de la boleta
$("#btnReimprimir").on("click", function(e)
{
    $("#modalAñoBoleta").modal("show");
    parseoImpresion()
});

