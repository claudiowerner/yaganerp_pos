//DESCARGA DE INFORMACIÓN
function descargarDetalle(codBarra)
{
    return $.ajax(
        {
            url:"func_php/consultarPrecio.php",
            data:{"cod_barra": codBarra},
            type: "POST",
            async: false
        }
    ).responseText;
}



//ACCIONES DE OBJETOS
$("#btnConsultarPrecio").on("click", function()
{
    $("#modalConsultarPrecio").modal("show");
    $("#txtCodConsultaPrecio").val("");
    document.getElementById("txtCodConsultaPrecio").focus();
    $("#nomProdConsulta").text("Producto");
    $("#precioProdConsulta").text("0000");
})
$("#txtCodConsultaPrecio").on("keyup", function(e)
{
    if(e.keyCode==13)
    {
        let cod_barra = $("#txtCodConsultaPrecio").val();
        let descarga = descargarDetalle(cod_barra);
        let json = JSON.parse(descarga);
        $("#nomProdConsulta").text(json.nombre);
        $("#precioProdConsulta").text(json.valor);
        

    }
})