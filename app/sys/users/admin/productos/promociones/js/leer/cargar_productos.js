$("#slctProductoPromocion").select2();
function cargarProductosPromocion()
{
    $.ajax({
        url: "promociones/funciones/leer/leer_productos.php",
        type: "POST",
        success: function(e)
        {
            let json = JSON.parse(e);
            let template = "";
            json.forEach(j=>{
                template = template +
                `<option value="${j.id}">${j.nombre_prod}</option>`;
            })
            $("#slctProductoPromocion").html(template);
            $("#slctProductoPromocionEditar").html(template);
        }
    })
    .fail(function(e){
        console.log(e.responseText);
    })
}