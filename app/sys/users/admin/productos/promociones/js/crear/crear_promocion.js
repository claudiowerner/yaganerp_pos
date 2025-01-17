/* ------------------------------------------------- FUNCION AJAX ---------------------------------------------------- */
function registrar_promocion()
{
    $.ajax({
        url: "promociones/funciones/crear/crear_promocion.php",
        type: "POST",
        success: function(e)
        {
            let j = JSON.parse(e);
            $("#idPromocion").html(j.id);
            $("#tablaPromociones").DataTable().ajax.reload();
        }
    })
}



/* ------------------------------------------------- FUNCION DOM ----------------------------------------------------- */
//Abrir modal registrar
$("#btnModalPromocion").on("click", function(e)
{
    $("#modalRegistrarPromocion").modal("show");
    registrar_promocion();
    cargarProductosPromocion();
});