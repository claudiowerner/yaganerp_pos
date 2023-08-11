//Accion al intentar eliminar venta
async function accionEliminarVenta(boton)
{
    let id = $(boton).attr("idVenta");
    $("#anVenta").text(id);

    $.ajax(
        {
            url:"func_php/read_config_clave.php",
            type: "POST",
            success: function(e)
            {
                if(e.match("S"))
                {
                    $("#solicClaveAut").modal("show");
                }
                else
                {
                    $.ajax({
                        url: "func_php/elim_venta_exe.php",
                        data: {"id_venta":id},
                        type: "POST",
                        success: function(r)
                        {
                            msjes_swal("Excelente", r, "success");
                            cargarVentasCaja();
                            $('#solicClaveAut').modal('hide');
                        }
                    }).fail( function(e) {
                        console.log( 'Error eliminar venta!!'+e.responseText );
                    }).done( function() {
                        console.log( 'done eliminar venta' );
                    }).always( function() {
                        console.log( 'Always eliminar venta' );
                    });
                }
            }
        }
    )



}