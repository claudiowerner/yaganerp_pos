

function cargarNuevoComprobante(id, url)
{
    $("#idComprobante").html(id);
    let html = "";
    $("#url").html(url);
    if(url.match(/pdf/)||url.match(/PDF/))
    {
        html = `<iframe src="${url}" type="application/pdf" width="100%" height="500px"></iframe>`;
    }
    else
    {
        html = `<img src="${url}" type="application/pdf" width="100%" height="100%"></img>`;
    }
    $("#archivoComprobante").html(html);
}