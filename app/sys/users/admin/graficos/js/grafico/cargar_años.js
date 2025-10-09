/* ----------------------------------------- FUNCION DOM ---------------------------------------------- */

function rellenarSelectAño()
{
    let template = '';

    $.ajax({
        url:"graficos/php/read_ano_venta.php",
        type: "GET",
        success: function(e)
        {
            let j = JSON.parse(e);
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
    })
    .fail(function(e){
        alert(e)
    })
}