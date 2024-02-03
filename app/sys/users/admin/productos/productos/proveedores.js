//cargar proveedores

$.ajax(
    {
        url: "productos/read_proveedores.php",
        type: "POST",
        success: function(e)
        {
            template = "";
            let json = JSON.parse(e);
            json.forEach(j=>
                {
                    template = template + 
                    `<option value='${j.id}'>${j.nombre_proveedor}</option>`;
                }
            );

            $("#slctProveedor").html(template);
            $("#slctProveedorEditar").html(template);
        }
    }
);