//modificar nombre de caja
function modificarNombreCaja(idCaja, nombre)
{
    let datos = 
    {
        "id": idCaja,
        "nombre": nombre
    }
    return $.ajax({
        url: "modificar_caja.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;    
}
$("#cierreCaja").on("click", ".btn-primary", function(e)
{
    let nombre_caja = $(this).attr("nomCaja");
    let idCaja = $(this).attr("idCierre");
    $("#strCaja").html(idCaja);
    $("#nombreCajaEditar").val(nombre_caja);
    $("#editarCaja").modal("show");
})

$("#btnEditarCaja").on("click", function(e)
{
    let nom_caja = $("#nombreCajaEditar").val();
    let idCaja = $("#strCaja").text();
    if(nom_caja == ""|| nom_caja==undefined)
    {
        msjes_swal("Aviso", "Debe rellenar todos los espacios", "warning")
    }
    else
    {
        let descarga = modificarNombreCaja(idCaja, nom_caja);
        let r = JSON.parse(descarga);
        msjes_swal(r.titulo, r.mensaje, r.tipo)
        obtenerCierresCaja();
    }
})
