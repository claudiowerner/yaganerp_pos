

function cargarArchivosComprobantes()
{
    let idCliente = $("#idCliente").text();
    
    $.ajax(
        {
            url: "php/cliente/read_comprobantes_tabla.php",
            type: "POST",
            data: {"id_cl": idCliente},
            success: function(e)
            {
                template = "";
                json = JSON.parse(e);
                json.forEach(j=>
                    {
                        template = template+
                        `<tr>
                            <td>${j.id}</td>
                        </tr>`;
                    }
                );
                $("#bodyComprobantes").html();
            }
        }
    )
    .fail(function(e)
    {
        msjes_swal("Error", e.responseText, "error");
    })
    
}