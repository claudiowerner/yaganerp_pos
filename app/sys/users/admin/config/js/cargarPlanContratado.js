

function descargarPlan()
{
    let ajax = $.ajax(
        {
            url: "plan_contratado/read_plan_contratado.php",
            type: "POST",
            async: false
        }
    ).responseText;

    return ajax;
}


