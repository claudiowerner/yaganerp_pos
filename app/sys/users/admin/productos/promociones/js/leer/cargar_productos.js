$("#slctProductoPromocion").select2();
function cargarProductosPromocion()
{
    $.ajax({
        url: "promociones/funciones/leer/leer_productos.php",
        type: "POST",
        success: function(e)
        {
            let id = $("#id_prod").text();
            let json = JSON.parse(e);
            let template = "";
            let selected;
            json.forEach(j=>{
                if(id == j.id)
                {
                    selected = "selected";
                }
                else
                {
                    selected = "";
                }
                template = template +
                `<option value="${j.id}" ${selected}>${j.nombre_prod}</option>`;
            })
            $("#slctProductoPromocion").html(template);
            $("#slctProductoPromocionEditar").html(template);
        }
    })
    .fail(function(e){
        console.log(e.responseText);
    })
}