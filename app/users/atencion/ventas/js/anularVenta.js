$("#btnAnular").on("click", function(e)
{
    let corr = $("#anVentaAnular").text();
    let hora = getHora();
    $.ajax(
        {
            url:"func_php/read_config_clave.php",
            type: "POST",
            success: function(e)
            {
                if(e.match("S"))
                {
                    $("#solicClaveAutAnular").modal("show");
                }
                else
                {
                    $.ajax(
                    {
                        url: "func_php/anular_venta_exe.php?corr="+corr+"&hora="+hora+"&nMesa="+nMesa,
                        type: "POST",
                        success: function(r)
                        {
                            let msje = r;
                            swal(
                                {
                                  title: "Excelente",
                                  text: r,
                                  icon: "success"
                                }
                              )
                            if(msje=="Venta anulada correctamente"||msje.match(/Venta anulada correctamente/))
                            {
                                location.href = '../';
                            }
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
})