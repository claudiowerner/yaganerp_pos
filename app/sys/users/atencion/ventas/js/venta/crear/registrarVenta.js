function registrarVenta(id_venta, idProd, cantProd, idCaja, nomCaja, hora)
{
    //comprobar si está activado el control de stock mínimo
    let estadoStockMinimo = comprobarEstadoStockMinimo();
    let jsonEstadoStock = JSON.parse(estadoStockMinimo);

    if(jsonEstadoStock.activo)
    {
        let cantidad = parseInt(comprobarCantidad(idProd));
        let stockMinimo = parseInt(cargarNumeroStockMinimo());

        if(cantidad<=stockMinimo)
        {
            if(cantProd<=cantidad)
            {
                if(cantidad<=0)
                {
                    swal({
                        title: "Aviso",
                        text: "Producto sin existencia",
                        icon: "warning"
                    })
                }
                else
                {
                    swal({
                        title: "Aviso",
                        text: "Quedan "+cantidad+" unidades del producto escaneado",
                        icon: "warning"
                    })
                    accionGuardarVenta(idCaja, id_venta, idProd, hora, cantProd, nomCaja);
                }
            }
            else
            {
                swal({
                    title: "Aviso",
                    text: "La cantidad solicitada del producto es mayor a la registrada en el stock",
                    icon: "warning"
                })
            }
            
        }
        else
        {
            accionGuardarVenta(idCaja, id_venta, idProd, hora, cantProd, nomCaja);
        }
    }
    if(!jsonEstadoStock.activo)
    {
        accionGuardarVenta(idCaja, id_venta, idProd, hora, cantProd, nomCaja);
    }
}



