/*--------------------------------------- FUNCIONES BASE DE DATOS ------------------------------------*/
/* Funcion que obtiene cuantos productos están asociados a la categoria que se desea eliminar*/
function productosAsociados(categoria)
{
    return $.ajax({
        url: "php/validar_existencia_producto_categoria.php",
        data: {"categoria": categoria},
        type: "POST",
        async: false
    }).responseText;
}


function eliminarCategoriaBD(id)
{
    return $.ajax({
        url: "php/eliminar_categoria.php",
        data: {"id": id},
        type: "POST",
        async: false
    }).responseText;
}

/*----------------------------------------- ACCIONES DOM ----------------------------------------------*/

function eliminarCategoria(id, nombre)
{
    let prod_asociados = productosAsociados(id);
    if(prod_asociados==0)
    {
        swal({
            title: "¿Está seguro?",
            text: `¿Desea eliminar la categoría ${nombre}?`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((pagar) => {
            if (pagar)
            {
                let respuesta = eliminarCategoriaBD(id);
                let json = JSON.parse(respuesta);
                msjes_swal(json.titulo, json.mensaje, json.icono);
                $('#categoria').DataTable().ajax.reload();
            }
            else 
            {
                msjes_swal("Operación cancelada");
            }
        });
    }
    else
    {
        msjes_swal("Aviso", "La categoría seleccionada no se puede eliminar. Tiene productos asociados a ella.", "warning");
    }
}