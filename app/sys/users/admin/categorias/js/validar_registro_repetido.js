function validarRegistroRepetido(nombre)
{
    return $.ajax({
        url: "php/validar_registro_repetido.php",
        data: {"nombre":nombre},
        type: "POST",
        async: false
    }).responseText;
}