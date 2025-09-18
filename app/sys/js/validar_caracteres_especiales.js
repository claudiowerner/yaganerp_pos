function validar_caracteres_especiales(cadena)
{
    const patron = /[^a-zA-Z0-9]/g

    return patron.test(cadena);
}