//modificar nombre de caja
function modificarNombreCaja(idCaja, nombre)
{
    let datos = 
    {
        "id": idCaja,
        "nombre": nombre
    }
    return $.ajax({
        url: "php/editar/modificar_caja.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;    
}
