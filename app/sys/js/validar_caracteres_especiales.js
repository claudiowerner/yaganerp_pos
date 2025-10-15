function validar_caracteres_especiales(cadena)
{
    const regex = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
    return regex.test(cadena);
}