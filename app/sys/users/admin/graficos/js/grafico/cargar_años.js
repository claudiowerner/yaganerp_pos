/* ----------------------------------------- FUNCION AJAX --------------------------------------------- */

function descargarSelectAñoAjax()
{
    return $.ajax({
        url:"graficos/php/read_ano_venta.php",
        type: "GET",
        async: false
    }).responseText;
}

/* ----------------------------------------- FUNCION DOM ---------------------------------------------- */

function rellenarSelectAño()
{
    let template = '';
    let resp = descargarSelectAñoAjax();
    let j = JSON.parse(resp);
    let fecha = new Date();
    let año = fecha.getFullYear();
    let selected = "";
    if(Array.isArray(j))
    {
        j.forEach(a=>{
            if(a.ano == año)
            {
                selected = "selected";
            }
            template += `<option value='${a.ano}' ${selected}>${a.ano}</option>`;
        });
    }
    else
    {
        template += `<option value='${j.ano}'>${j.ano}</option>`;
    }
    $("#anoVenta").html(template);
}