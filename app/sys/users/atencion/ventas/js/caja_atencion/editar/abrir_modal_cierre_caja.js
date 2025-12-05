$("#btnCerrarCaja").on("click", function(e)
{
    let validar = validar_ventas_activas();
    
    let j = JSON.parse(validar);
    if(j.ventas_activas)
    {
        //Si existen ventas activas
        msjes_swal(j.titulo, j.mensaje, j.icono);
    }
    else
    {
        swal({
            title: "¿Está seguro?",
            text: "¿Desea cerrar esta caja?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((cerrar) => {
            if (cerrar)
            {
                $("#modalResumenCierreCaja").modal("show");
                imprimirInformacion();
            } 
            else 
            {
                swal("La caja seguirá abierta");
            }
        });
    }
})
