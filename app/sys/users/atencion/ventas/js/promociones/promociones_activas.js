function promocionActiva()
{
    return $.ajax({
        url: "func_php/promociones/promociones_activas.php",
        type: "POST", 
        async: false
    }).responseText;
}