function leerConfigClave()
{
    return $.ajax(
        {
            url:"func_php/clave_aut/read_config_clave.php",
            type: "POST",
            async: false
        }
    ).responseText;
}