function crear_cod_barra(texto)
{
    JsBarcode(
        "#imgCodBarra", 
        texto, {
            format: "codabar",
            lineColor: "#000",
            width: 2,
            height: 60, 
            displayValue: true
        }
    )
}