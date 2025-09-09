

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
        $('#cierreCaja').DataTable().ajax.reload();
    }
})
