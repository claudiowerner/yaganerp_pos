function validarCajasActivas(creados, permitidos)
{
    let retorno;
    if(creados==permitidos)
    {
        retorno = 100;//retornará 100 si es que la cantiadad de usuarios activos es igual a la de usuarios permitidos según el plan contratado
    }
    if(creados>permitidos)
    {
        retorno = 150;//retornará 150 si se excede la cuota de usuarios permitidos
    }
    if(creados<permitidos)
    {
        retorno = 50; //retornará 50 si se está dentro de la cuota de usuarios permitida
    }
    return retorno;
}