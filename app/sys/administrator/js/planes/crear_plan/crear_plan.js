/* ----------------------------------------------------- FUNCION AJAX ----------------------------------------------- */
function crearPlan(nomPlan, numUsuarios, numCajas, valorPlan)
{
    let datos = {
        "nombre": nomPlan,
        "usuarios": numUsuarios,
        "cajas": numCajas,
        "valor": valorPlan
    }
    return $.ajax({
        url: "php/planes/crear_plan.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}


/* ----------------------------------------------------- FUNCION DOM ------------------------------------------------ */
$("#btnGuardarPlan").on("click", function(e)
{
    let nomPlan = $("#nomPlan").val();
    let numUsuarios = $("#numUsuarios").val();
    let numCajas = $("#numCajas").val();
    let valorPlan = $("#txtValorPlan").val();

    let respuesta = crearPlan(nomPlan, numUsuarios, numCajas, valorPlan);
    let j = JSON.parse(respuesta);

    msjes_swal(j.titulo, j.mensaje, j.icono);

    if(j.registrar_plan)
    {
        $('#planes').DataTable().ajax.reload();
        $("#modalRegistrarPlan").modal("hide");
        cargarPlan();
    }

    /*

    success: function(e)
        {
            msjes_swal("Excelente", e, "success");
            
        }*/
})
