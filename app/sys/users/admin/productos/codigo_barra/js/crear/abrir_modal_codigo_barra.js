$("#btnAbrirModalCodigo").on("click", function(e)
{
    let texto = $("#codigoBarra").val();
    abrirModalCodBarra(texto);
});

function abrirModalCodBarra(texto, nombre)
{
    if(texto!="")
    {
        $("#modalGenerarCodBarra").modal("show");
        crear_cod_barra(texto, nombre);
    }
    else
    {
        msjes_swal("Aviso", "Debe indicar el código que desea generar.", "warning");
    }
}