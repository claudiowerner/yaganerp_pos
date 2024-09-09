/* --------------------------------------------------- FUNCION AJAX --------------------------------------------------- */
function cargarGirosAjax()
{
    return $.ajax({
        url: "php/cliente/cargarGiros.php",
        type: "POST",
        async: false
    }).responseText;
}

/* --------------------------------------------------- FUNCION DOM ---------------------------------------------------- */
$("#slctGiros").select2();
let descarga = cargarGirosAjax();
let json = JSON.parse(descarga);
template = "";
json.forEach(d=>{
    template = template + 
    `<option value=${d.id}>${d.nombre}</option>`;
})
$("#slctGiros").html(template);
$("#slctGirosEditar").html(template);