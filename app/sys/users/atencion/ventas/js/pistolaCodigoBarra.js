//funcion de descarga de datos

function descargarID(codigo)
{
    return $.ajax(
        {
            url: "func_php/comprobar_existencia_producto_cod_barra.php",
            data: {"cod_barra":codigo},
            type: "POST",
            async: false
        }
    ).responseText;
}

function registro(idProd)
{
    let id_venta = $("#id_venta").text();
    let cantProd = $("#cantProd").text();
    let idCaja = $("#nCaja").text();
    let nomCaja = $("#nomCaja").text();
    //capturar hora
    let hora = getHora();
    registrarVenta(id_venta, idProd, cantProd, idCaja, nomCaja, hora)
}

//agregar producto al pistolear código de barra
$("#txtCodBarra").on("keyup", function(enter)
{

    if(enter.keyCode==13)
        {
            codigo = $("#txtCodBarra").val();

            //se descarga el ID del producto seleccionado según codigo de barra
            let descarga = descargarID(codigo);
            let producto = JSON.parse(descarga);

            //si el producto se ha encontrado
            if(producto.encontrado)
            {

                //comprobar estado stock mínimo (ACTIVO: TRUE; INACTIVO: FALSE)
                let descargaStock = comprobarEstadoStockMinimo();

                //se parsea en JSON la variable "descargaStock"
                let estadoStockMinimo = JSON.parse(descargaStock);

                if(estadoStockMinimo.activo)
                {
                    //Descarga y parseo de la cantidad de producto
                    let cantidadProd = parseInt(comprobarCantidad(producto.id));

                    //descarga del stock minimo
                    let stockMinimo = obtenerStockMinimo();
                    let jsonStockMinimo = JSON.parse(stockMinimo);

                    //Si está definido el stock
                    if(jsonStockMinimo.stock_minimo)
                    {
                        let j = jsonStockMinimo;
                        if(cantidadProd>j.stock_minimo)
                        {
                            registro(producto.id);
                        }
                        if(cantidadProd<j.stock_minimo||cantidadProd==0)
                        {
                            msjes_swal("Aviso", "Quedan "+cantidadProd+" unidades del producto escaneado", "warning");
                            registro(producto.id);
                        }
                    }
                    if(jsonStockMinimo.titulo)
                    {
                        let j = jsonStockMinimo;
                        msjes_swal(j.titulo, j.mensaje, j.icono);
                    }
                }
                
            }
            else
            {
                registro(producto.id);
            }

            $("#txtCodBarra").val("");
            $("#txtCodBarra").trigger("focus");
        }
});