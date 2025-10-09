//Abrir modal registrar
$("#btnModalPromocion").on("click", function(e)
{
    $("#modalRegistrarPromocion").modal("show");
    cargarProductosPromocion();
});