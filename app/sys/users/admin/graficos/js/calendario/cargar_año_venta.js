/* --------------------------------------------- FUNCION DOM ----------------------------------------- */
$("#btnCalendario").on("click", function(e)
{
    $("#modalAñoVenta").modal("show");
    let template = "";
    $.ajax({
        url: "graficos/php/calendario/año_venta/año_venta.php",
        type: "POST",
        success: function(e)
        {
            let json = JSON.parse(e);

            json.forEach(j=>{
                template +=`<button class='${j.ano_en_curso}' style="margin: 10px" onclick=cargarMes(${j.ano})><h1>${j.ano}</h1></button>`;
            });
            $("#añoVenta").html(template);
        }
    })
});
