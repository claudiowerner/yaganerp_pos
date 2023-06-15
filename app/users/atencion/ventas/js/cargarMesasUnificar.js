//cargar Unificar Mesa
idUbic = $("#idUbic").text();
idMesa = $("#nMesa").text()

cargarNombre = "";
cargarUnificarMesa();

function cargarUnificarMesa()
{
    $.ajax(
        {
            url:"func_php/cargar_unificar_mesas.php?idUbic="+idUbic+"&idMesa="+idMesa,
            type: 'GET',
            success: function(response)
            {
                let template_mesas = '';
                let tasks = JSON.parse(response);
                if(Array.isArray(tasks))
                {
                    tasks.forEach(t=>{
                        template_mesas+=`
                        <option value="${t.id}" nombre="${t.nom_mesa}">${t.nom_mesa}</option>`;
                    });
                    if(template_mesas!='')
                    {
                        console.log(template_mesas);
                        $("#unificarMesas").html(template_mesas);
                    }
                    else
                    {
                        $("#unificarMesas").html('<option>Sin mesas para unificar</option>');
                        $("#btnConfirmarUnif").attr("disabled", false);
                    }
                }
            }
        }
    )
    .done( function() 
    {
        console.log( 'Success mesas!!' );
    })
    .fail( function(resp) 
    {
        console.log( 'Error unificar mesas!! '+resp.responseText );
    })
    .always( function()
    {
        console.log( 'Always' );
    });
    
}
