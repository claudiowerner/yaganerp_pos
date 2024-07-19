function validarTelefono(numeroTelefono) {
    // Expresión regular para validar un número de teléfono en formato internacional
    var patron = /^\+[1-9]\d{0,2}\s?\d{3,4}\s?\d{4}$/;
  
    // Validar el número de teléfono usando la expresión regular
    if (patron.test(numeroTelefono)) 
    {
        return true;
    }
    else
    {
        return false;
    }
}

  