//verificación de permisos

let id_usu = $("#id_usuario").text();
$.ajax(
    {
        url:"../../read_permisos_usuario.php",
        data:{"id_usu": id_usu},
        type: "POST",
        success: function(e)
        {
            if(!e.match(/1/)||e==null||e=="")
            {
                $("#div_ventas").html("Sin permiso de ventas.");
            }
            if(!e.match(/2/)||e==null||e=="")
            {
                $("#div_pagarCta").html("Sin permiso de pagar cuentas.");
            }
            if(!e.match(/3/)||e==null||e=="")
            {
                $("#div_anular").html("Sin permiso de anular venta.");
            }
            if(!e.match(/4/)||e==null||e=="")
            {
                $("#div_cambiarMesa").html("Sin permiso de cambiar la mesa.");
            }
        }
    }
)
.fail(function(e)
{
    console.log("Error permisos: "+e.responseText);
})