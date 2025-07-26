//verificación de permisos

let id_usu = $("#id_usuario").text();
$.ajax(
    {
        url:"../../read_permisos_usuario.php",
        data:{"id_usu": id_usu},
        type: "POST",
        success: function(e)
        {
            let permiso_ventas = false;
            
            let j = JSON.parse(e)
            j.forEach(j=>{
                if(j.permiso!=2)
                {
                    permiso_ventas = false;
                }
                else
                {
                    permiso_ventas = true;
                }
            })
            if(permiso_ventas == false)
            {
                $("#div_ventas").html("Sin permiso de ventas.");
            }
        }
    }
)
.fail(function(e)
{
    console.log("Error permisos: "+e.responseText);
})