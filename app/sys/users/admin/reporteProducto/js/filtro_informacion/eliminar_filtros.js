



$("#btnEliminarFiltros").on("click", function(e)
{
    $("#fecha_inicio").val("");
    $("#fecha_fin").val("");

    cargarGraficosBarraSinFiltrar();
    cargarGraficosTartaSinFiltrar();
})