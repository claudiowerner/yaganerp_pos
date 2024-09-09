

/* --------------------------------------------------- FUNCION AJAX -------------------------------------------------- */
function eliminarPlanAjax(id)
{
    return $.ajax({
        url: "php/planes/eliminar_plan.php",
        data: {"id": id},
        type: "POST",
        async: false
    }).responseText;
}

/* ---------------------------------------------------- FUNCION DOM -------------------------------------------------- */
function eliminarPlan(id, nombre)
{
    swal({
        title: "¿Está seguro?",
        text: `¿Desea eliminar el plan '${nombre}'?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((pagar) => {
        if (pagar)
        { 
            try
            {
                let uso_plan = parseInt(validarUsoPlan(id));
                
                if(uso_plan!=0)
                {
                    msjes_swal("Aviso", "No se eliminó el plan ya que existen clientes asociados al plan", "warning");
                }
                else
                {
                    let respuesta = eliminarPlanAjax(id);
                    let j = JSON.parse(respuesta);

                    msjes_swal(j.titulo, j.mensaje, j.icono)

                    if(j.eliminar_plan)
                    {
                        $('#planes').DataTable().ajax.reload();
                    }
                }
            }
            catch(e)
            {
                msjes_swal("Error", "El número recibido desde la BD no es un valor numérico", "error");
            }
        }
        else 
        {
            msjes_swal("Operación cancelada");
        }
    });
}