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
    let año = JSON.parse(resp);
    if(Array.isArray(año))
    {
        año.forEach(a=>{
            template += `<option value='${a.ano}'>${a.ano}</option>`;
        });
    }
    else
    {
        template += `<option value='${año.ano}'>${año.ano}</option>`;
    }
    $("#añoVenta").html(template);
}