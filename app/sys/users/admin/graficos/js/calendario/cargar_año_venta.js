/* -------------------------------------------- FUNCION AJAX ----------------------------------------- */
function descargarAño()
{
    return $.ajax({
        url: "graficos/php/calendario/año_venta/año_venta.php",
        type: "POST",
        async: false
    }).responseText;
}

/* --------------------------------------------- FUNCION DOM ----------------------------------------- */
$("#btnCalendario").on("click", function(e)
{
    $("#modalAñoVenta").modal("show");
    let template = "";

    let descarga = descargarAño();
    console.log(descarga);
    let json = JSON.parse(descarga);

    json.forEach(j=>{
        template +=`<button class='${j.ano_en_curso}' style="margin: 10px" onclick=cargarMes(${j.ano})><h1>${j.ano}</h1></button>`;
    });
    $("#añoVenta").html(template);
});
