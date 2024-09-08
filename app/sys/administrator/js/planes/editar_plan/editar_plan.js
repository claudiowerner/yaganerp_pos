/* --------------------------------------------------- FUNCION AJAX ------------------------------------------------- */
function modificarPlan(datos)
{
    return $.ajax({
        url:"php/planes/editar_plan.php",
        data: datos, 
        type: "POST",
        async: false
    }).responseText;
}

/* ---------------------------------------------------- FUNCION DOM ------------------------------------------------- */
function modalEditarPlan(id, nombre, usuarios, cajas, valor)
{
    $("#modalEditarPlan").modal("show");
    $("#idPlanEditar").html(id);
    $("#nomPlanEditar").val(nombre);
    $("#numUsuariosEditar").val(usuarios);
    $("#numCajasEditar").val(cajas);
    $("#valorPlanEditar").val(valor);
}


//Modificar plan

$("#btnModificarPlan").on("click", function(e)
{
    let idPlan = $("#idPlanEditar").text();
    let nomPlan = $("#nomPlanEditar").val();
    let numUsuarios = $("#numUsuariosEditar").val();
    let numCajas = $("#numCajasEditar").val();
    let valorPlan = $("#valorPlanEditar").val();

    let datos = {
        "id": idPlan,
        "nombre": nomPlan,
        "usuarios": numUsuarios,
        "cajas": numCajas,
        "valor": valorPlan,
        "estado": ep
    }
    
    let respuesta = modificarPlan(datos);
    let j = JSON.parse(respuesta);

    msjes_swal(j.titulo, j.mensaje, j.icono);

    if(j.editar_plan)
    {
        $("#modalEditarPlan").modal("hide");
        $('#planes').DataTable().ajax.reload();
    }
});