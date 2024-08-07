/*La variable formato, nos debe indicar qué formato queremos darle al número, por ejemplo, si es un precio,
debería mostrarse algo como $xxx.xxx.xxx, y si no, se muestra el número formateado sin $. 
Para indicar formato precio, debe recibir una "P" como valor, o si no, una "V"*/

function formatearNumero(formato, valor)
{
    let precioFormateado = "";
    let formateadorDolar = null;
    if(formato=="P")
    {
        const locales = 'es-CL';
        const opciones = {
            style: 'currency',
            currency: 'CLP',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }
        formateador = new Intl.NumberFormat(locales, opciones)
        precioFormateado = formateador.format(valor)
    }
    if(formato=="V")
    {
        precioFormateado = new Intl.NumberFormat("es-CL").format(valor);
    }

    return precioFormateado;
}