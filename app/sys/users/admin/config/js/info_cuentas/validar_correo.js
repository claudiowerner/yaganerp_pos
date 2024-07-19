
//funcion que valida el correo electrónico
function validarCorreo(cadena) {
    // Expresión regular para validar un correo electrónico
    var patron = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  
    // Validar el correo electrónico usando la expresión regular
    if (patron.test(cadena))
    {
        return true;
    } 
    else
    {
        return false;
    }
}