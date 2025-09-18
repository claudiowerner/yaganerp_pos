
//Esta función detecta la cantidad de caracteres y se encarga de llamar a la función que detecta caracteres especiales, y de acuerdo
//a que si existen caract. especiales o si tiene más de 0 caracteres, se activa el botón de enviar sugerencia.
function contar_caracteres()
{
    let caracteres = $("#txtSugerencia").val();
    
    //Contar caracteres
    let c = caracteres.length;

    $("#caract").html(c);

    
    //validar caracteres especiales
    let car_esp = validar_caracteres_especiales(caracteres);
    if(c==0||car_esp==true)
    {
        $("#btnEnviarSugerencia").prop("disabled", true)
    }
    else
    {
        $("#btnEnviarSugerencia").prop("disabled", false)
    }
    if(car_esp)
    {
        $("#alertCaractEspeciales").show();
    }
    else
    {
        $("#alertCaractEspeciales").hide();
    }
    
    console.log(car_esp);
}