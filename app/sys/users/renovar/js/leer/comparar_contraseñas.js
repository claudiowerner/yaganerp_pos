function comparar_contraseñas()
{
    let contr1 = $("#t_pass").val();
    let contr2 = $("#t_pass2").val();
    let template = "";

    if(contr1!=contr2)
    {
        template = 
        `<div class='alert alert-danger'>
            Las contraseñas indicadas no coinciden.
        </div>`;
    }
    else
    {
        template = "";
    }
    $("#contrasena").html(template)
}