nMesa = $("#nMesa").text();
$("#btnComandaCocina").on("click", function(e)
{
    window.open ("comandas/comanda_cocina.php?nMesa="+nMesa, "_blank");
});

$("#btnComandaBar").on("click", function(e)
{
    window.open ("comandas/comanda_bar.php?nMesa="+nMesa, "_blank");
});


