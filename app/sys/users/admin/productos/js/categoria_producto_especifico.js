/* -------------------------------- CONEXION CON BD ------------------------------------- */

function descargarIDCategoria(nombre)
{
    return $.ajax({
        url:"funciones/read_categorias_prod_especifico.php",
        type: "POST",
        data: {"nomCat": nombre},
        async: false
    }).responseText;
}

/* --------------------------------- FUNCIONES DOM --------------------------------------- */

function obtenerID(nombre)
{
    let descarga = descargarIDCategoria(nombre);
    let tasks = JSON.parse(descarga);
    tasks.forEach(cat=>{
        $("#listCatEditar").val(cat.id);
    });
}