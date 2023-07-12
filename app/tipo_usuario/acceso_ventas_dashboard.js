/*  Se verifica y se dan las opciones al usuario de tipo administrador de acceder al menú de ventas desde el 
dashboard o al dashboard desde ventas*/

//Se obtiene el número de la opción a la que se ingresó
let opcion = $("#opcion").text();

//almacena la URL del archivo PHP
url = "";
permisos = "";

//variable que obtiene si se accede a un item o subitem u otros
let item = $("#session").attr("item");
if(item=="index")
{
    url = "../../tipo_usuario/tipo_usuario.php";
    permisos = "../../tipo_usuario/read_permisos.php";
}
if(item=="item")
{
    url = "../../../tipo_usuario/tipo_usuario.php";
    permisos = "../../../tipo_usuario/read_permisos.php";
}
if(item=="subitem")
{
    url = "../../../../tipo_usuario/tipo_usuario.php";
    permisos = "../../../../tipo_usuario/read_permisos.php";
}
if(item=="subsubitem")
{
    url = "../../../../../tipo_usuario/tipo_usuario.php";
    permisos = "../../../../../tipo_usuario/read_permisos.php";
}

if(item=="subsubsubitem")
{
    url = "../../../../../../tipo_usuario/tipo_usuario.php";
    permisos = "../../../../../../tipo_usuario/read_permisos.php";
}
$.ajax(
{
    url:url,
    type: "POST",
    success: function(e)
    {
        //se verifica el tipo de usuario
        json = JSON.parse(e);
        json.forEach(usuario =>
        {
            let opciones = $("#session").html();
            let index;
            let atencion;
            let tituloIndex;
            let tituloAtencion;
            tipo_usuario = usuario.tipo_usuario;
            if(tipo_usuario==1)
            {
                if(opcion==1)
                {
                    // se verifica la opción a la que va a entrar
                    if(item=="index")
                    {
                        index = "index.php";
                        atencion = "../atencion/index.php"
                    }
                    if(item=="item")
                    {
                        index = "../index.php";
                        atencion = "../../atencion/index.php";
                    }
                    if(item=="subitem")
                    {
                        index = "../../index.php";
                        atencion = "../../../atencion/index.php";
                    }
                    if(item=="subsubitem")
                    {
                        index = "../../../index.php";
                        atencion = "../../../../atencion/index.php";
                    }
                    if(item=="subsubsubitem")
                    {
                        index = "../../../../index.php";
                        atencion = "../../../../../atencion/index.php";
                    }
                    tituloIndex = "Dashboard";
                    tituloAtencion = "Acceder a ventas";
                }
                if(opcion==2)
                {
                    // se verifica la opción a la que va a entrar
                    if(item=="index")
                    {
                        index = "index.php";
                        atencion = "../admin/index.php"
                    }
                    if(item=="item")
                    {
                        index = "../index.php";
                        atencion = "../../admin/index.php";
                    }
                    if(item=="subitem")
                    {
                        index = "../../index.php";
                        atencion = "../../../admin/index.php";
                    }
                    if(item=="subsubitem")
                    {
                        index = "../../../index.php";
                        atencion = "../../../../admin/index.php";
                    }
                    
                    tituloIndex = "Home";
                    tituloAtencion = "Acceder a Admin";
                }

                i = `
                    <li>
                        <a href=`+index+`>
                            <span>
                            </span>`+tituloIndex+`</a>
                    </li>`;
                v = `
                    <li>
                        <a href=`+atencion+`>
                        <span>
                        </span>`+tituloAtencion+`</a>
                    </li>`;

                    $.ajax(
                        {
                            url:permisos,
                            type:"GET",
                            async: false,
                            success: function(e)
                            {
                                json = JSON.parse(e);
                                if(json.indexOf("1") != -1)
                                {
                                    $("#session").html(i+v);
                                }
                                else
                                {
                                    $("#session").html(i);
                                }
                            }
                        })
                    .fail(function(e)
                    {
                        console.log("Error: "+e.responseText);
                    });
                

            }
            if(tipo_usuario == 2 || tipo_usuario == 3)
            {
                // se verifica la opción a la que va a entrar
                if(item=="index")
                {
                    index = "index.php";
                }
                if(item=="item")
                {
                    index = "../index.php";
                }
                if(item=="subitem")
                {
                    index = "../../index.php";
                }
                if(item=="subsubitem")
                {
                    index = "../../../index.php";
                }
                tituloIndex = "Mesas";
                opciones = opciones + `
                    <li>
                        <a href=`+index+`>
                            <span>
                            </span>`+tituloIndex+`</a>
                    </li>`;
                    $("#session").html(opciones);
            }           
        })
    }
})
.fail(function(e)
{
    console.log("Error al obtener tipo de usuario: "+e.responseText);
})

