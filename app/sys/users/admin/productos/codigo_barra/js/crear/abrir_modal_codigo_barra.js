$("#btnAbrirModalCodigo").on("click", function(e)
{
    let texto = $("#codigoBarra").val()
    
    if(texto!="")
    {
        $("#modalGenerarCodBarra").modal("show");
        crear_cod_barra(texto);
    }
    else
    {
        msjes_swal("Aviso", "Debe indicar el código que desea generar.", "warning");
    }
});