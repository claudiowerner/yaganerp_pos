$("#graficoTartaCategorias").hide();  
$("#graficoTartaProductos").hide();  
$("#graficoBarraCategorias").show();  
$("#graficoBarraProductos").show();  



$("#radioGraficoTarta").on("click", function(e)
{
    $("#graficoTartaCategorias").show();  
    $("#graficoTartaProductos").show();  
    $("#graficoBarraCategorias").hide();  
    $("#graficoBarraProductos").hide();  
    
});


$("#radioGraficoBarra").on("click", function(e)
{
    $("#graficoTartaCategorias").hide();  
    $("#graficoTartaProductos").hide();  
    $("#graficoBarraCategorias").show();  
    $("#graficoBarraProductos").show();  
});