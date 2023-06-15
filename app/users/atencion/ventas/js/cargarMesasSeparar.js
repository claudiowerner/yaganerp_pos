//cargar Unificar Mesa
idUbic = $("#idUbic").text();
idMesa = $("#nMesa").text()

cargarNombre = "";
cargarSepararMesa();

function cargarSepararMesa()
{
    $.ajax(
        {
            url:"func_php/cargar_separar_mesas.php?idUbic="+idUbic+"&idMesa="+idMesa,
            type: 'GET',
            success: function(response)
            {
                let template_mesas = '';
                try
                {
                    let tasks = JSON.parse(response);
                    if(Array.isArray(tasks))
                    {
                        tasks.forEach(t=>{
                            template_mesas+=`
                            <option value="${t.id}" nombre="${t.nom_mesa}">${t.nom_mesa}</option>`;
                        });
                        
                        if(template_mesas!='')
                        {
                            $("#separarMesas").html(template_mesas);
                        }
                        else
                        {
                            $("#separarMesas").html('<option>Sin mesas para unificar</option>');
                            $("#btnConfirmarUnif").attr("disabled", false);
                        }
                    }
                }
                catch(e)
                {
                    $("#separarMesas").html('<option></option>');
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
