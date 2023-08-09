$("#btnPagarCuenta").on("click", function(e)
{
    $("#modalPagarCuenta").modal("show");
})


$("#txtBuscarCliente").on("keyup", function(e)
{
    let template = ""
    let rut = $("#txtBuscarCliente").val();
    if(rut=="")
    {
        template = 
        `<tr align="center">
            <td colspan=4>Ingrese un parámetro de búsqueda</td>
        </tr>`;
        $("#datosClientePagarCuenta").html(template)
    }
    else
    {
        $.ajax({
            url: "func_php/busqueda_datos_cliente.php",
            data: {"rut": rut},
            type: "POST",
            success: function(e)
            {
                try
                {
                    json = JSON.parse(e);
                    json.forEach(j=>
                        {
                            template +=
                            `<tr>
                                <td>${j.rut}</td>
                                <td>${j.nombre}</td>
                                <td>${j.apellido}</td>
                                <td><button onClick='selecCliente("${j.rut}")' class='btn btn-success'>Seleccionar</button></td>
                            </tr>`;
                            $("#datosClientePagarCuenta").html(template)
                        }
                    )
                }
                catch(e)
                {
                    template = 
                    `<tr align="center">
                        <td colspan=4>Ingrese un parámetro de búsqueda <strong>válido</strong></td>
                    </tr>`;
                    $("#datosClientePagarCuenta").html(template)
                }
            }
        })
    }
})


function selecCliente(rut)
{
    $("#modalPagarCuenta").modal("hide");
    $("#modalSeleccionarCuenta").modal("show");
    
    $.ajax(
        {
            url: "func_php/cargar_cuentas_cliente.php",
            data: {"rut":rut},
            type: "POST",
            success: function(e)
            {
                template = "";
                json = JSON.parse(e);
                json.forEach(j=>
                    {
                        template+=
                        `<tr>
                            <td>${j.correlativo}</td>
                            <td>${j.fecha}</td>
                            <td>${j.valor}</td>
                            <td><button class='btn btn-success' onClick='pagar(${j.correlativo})'>Pagar</button></td>
                        </tr>`;
                    }
                )
                $("#bodyCuentas").html(template);
            }
        }
    )

}


function pagar(corr)
{
    swal({
        title: "¿Está seguro?",
        text: "¿Desea registrar el pago completo?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((pagar) => {
        if (pagar)
        {
          confirmarPaga();
        } 
        else 
        {
          swal("Operación cancelada");
        }
      });
}
