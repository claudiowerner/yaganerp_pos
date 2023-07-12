function registrarVenta(id_venta, idProd, cantProd, idCaja, nomCaja, hora)
{
    //comprobar si está activado el control de stock mínimo
    let sm_activado="";
    
    $.ajax(
        {
            url:"func_php/comprobar_estado_stock_minimo.php",
            type:"POST",
            async: false,
            success: function(e)
            {
                sm_activado = e;
            }
        }
    )
    if(sm_activado.match("S"))
    {
        let cantidad = comprobarCantidad(idProd);
        let stockMinimo = cargarNumeroStockMinimo();
        

        if(cantidad<=stockMinimo)
        {
            if(cantidad<cantProd)
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
            
        }
    }
    if(sm_activado.match("N"))
    {
        accionGuardarVenta(idCaja, id_venta, idProd, hora, cantProd, nomCaja);
    }
}



function accionGuardarVenta(idCaja, id_venta, idProd, hora, cantProd, nomCaja)
{
    $.ajax(
        {
            url:"func_php/crear_venta_exe.php?idCaja="+idCaja+"&id_venta="+id_venta+"&idProd="+idProd+"&cantProd="+cantProd+"&nomCaja="+nomCaja+"&hora="+hora,
            type: "GET",
            success: function(r)
            {
                cargarVentasCaja();
            }
        })
        .fail( function(e) 
        {
            console.log( 'Error productos!!'+e.responseText );
        })
        .done( function() 
        {
            console.log( 'done productos' );
        })
        .always( function() 
        {
            console.log( 'Always productos' );
        }
    );
}