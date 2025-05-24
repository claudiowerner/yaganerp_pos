function crear_cod_barra(texto, nombre_prod)
{
    JsBarcode(
        "#imgCodBarra", 
        texto, {
            text: nombre_prod, 
            format: "codabar",
            lineColor: "#000",
            width: 2,
            height: 60, 
            displayValue: true
        }
    )
}