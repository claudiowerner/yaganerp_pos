//comprobar existencia de nombre del producto
function comprobarExistenciaCodigoBarra(cb)
{
    return $.ajax({
        url:"funciones/validar_existencia_producto.php",
        data: {"cod_barra":cb},
        type: "POST",
        async: false,
    }).responseText;
    
}