/* ---------------------------------------- CONEXIÓN A LA BD --------------------------------------- */
function editarClienteBD(datos)
{
    $.ajax({
        url: "funciones/editar_cliente.php",
        data: datos,
        type: "POST",
        beforeSend: function()
        {
            $("#btnEditar").html("Procesando...");
            $("#btnEditar").prop("disabled", true);
        },
        success: function(e)
        {
            let j = JSON.parse(e);

            msjes_swal(j.titulo, j.mensaje, j.icono);
            
            if(j.edicion)
            {
                $("#modalEditar").modal("hide");
            }
            $("#btnEditar").html("Guardar");
            $("#btnEditar").prop("disabled", false);
        }
    })
}
