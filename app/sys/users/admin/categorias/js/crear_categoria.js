/* --------------------------------------- REGISTRO BD ------------------------------------------- */
function registroCategoriaBD(nombre)
{
    return $.ajax({
        url:"php/crear_categoria_exe.php",
        type: "POST",
        data: {"nomCat":nombre},
        async: false
    }).responseText;
}



/* -------------------------------------------- ACCIONES DOM ---------------------------------------- */
$("#btnAgregarCategoria").on("click", function(e)
{
    $("#modalRegistro").modal("show");
});


//acciones guardar categoría
$("#btnGuardar").on("click", function(e)
{
    let nombre = $("#nomCat").val();
    if(nombre=="")
    {
        msjes_swal("Aviso", "Debe rellenar el campo Nombre", "warning");
    }
    else
    {
        let reg_repetido = parseInt(validarRegistroRepetido(nombre))
        if(reg_repetido==0)
        {
            let crear_categoria = registroCategoriaBD(nombre);
            let json = JSON.parse(crear_categoria);

            msjes_swal(json.titulo, json.mensaje, json.icono);

            if(json.registro)
            {
                $("#categoria").DataTable().ajax.reload();
                $("#modalRegistro").modal("hide");
            }
        }
        else
        {
            msjes_swal("Aviso", "La categoría '"+nombre+"' ya existe.", "warning");
        }
    }
});