function validar_fechas(fecha)
{
    const formato = "^\\d{4}-\\d{2}-\\d{2}$";
    let split = fecha.split("-");
    let dia = split[2];
    let mes = split[1];
    let año = split[0];
    let fecha_retorno = 0;
    if(año>1999)
    {
        fecha_retorno = `${año}-${mes}-${dia}`;
    }
    const regex = RegExp(formato);
    return regex.test(fecha_retorno);
}