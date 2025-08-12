/* -------------------------------- CONEXION CON BD ------------------------------------- */

function descargarIDCategoria(nombre)
{
    return $.ajax({
        url:"productos/funciones/leer/read_categorias_prod_especifico.php",
        type: "POST",
        data: {"nomCat": nombre},
        async: false
    }).responseText;
}

/* --------------------------------- FUNCIONES DOM --------------------------------------- */
