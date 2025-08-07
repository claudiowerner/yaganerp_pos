function cargarNombreCliente()
{
    let rut = $("#rut").text();
    $.ajax({
        url: "script_php/read_datos_cliente.php",
        data: {"rut": rut},
        type: "POST",
        success: function(e)
        {
            let json = JSON.parse(e);
            json.forEach(j=>{
                $("#nombre").html(j.nombre);
                $("#apellido").html(j.apellido);
            })
        }
    })
}
