
/* ---------------------------------------------- FUNCION AJAX ------------------------------------------------------ */
function validarUsoPlan(id)
{
    return $.ajax({
        url: "php/planes/validar_uso_planes.php",
        data: {"id": id}, 
        type: "POST", 
        async: false
    }).responseText;
}