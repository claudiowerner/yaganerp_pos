/* --------------------------------------- FUNCIONES AJAX ---------------------------------------------- */

//Eliminar archivo
function eliminarArchivo(nombre_archivo)
{
    return $.ajax({
        url: "php/cliente/comprobante/eliminar_archivo_comprobante.php",
        data: {"nombre_archivo": nombre_archivo},
        type: "POST",
        async: false
    }).responseText;
}

//Cargar archivo
function cargarArchivo(form_data)
{
    return $.ajax({
        type: 'POST',
        url: 'php/cliente/comprobante/cargarArchivos.php',
        contentType: false,
        processData: false,
        data: form_data,
        async: false
    }).responseText;
}

//Registrar en BD
function modificarArchivoEnBD(datos)
{
    return $.ajax({
        url: "php/cliente/comprobante/modificar_archivo_comprobante.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}


/* --------------------------------------- FUNCIONES DOM ----------------------------------------------- */
$("#btnCargarArchivoNuevo").on("click", function(e)
{
    e.preventDefault();
    let id_cl = $("#idCliente").text();
    let dir_archivo_eliminar = $("#url").text();
    let url_tokenizer = dir_archivo_eliminar.split("/")
    let archivo_eliminar = url_tokenizer[4];
    
    /*Eliminar archivo. Si se retorna un 1 como resultado, se procede a modificar la URL del archivo y a 
    cargar el nuevo comprobante*/
    let eliminar = eliminarArchivo(archivo_eliminar);
    if(eliminar == 1)
    {
        let dir_archivo;
        let archivo2 = $('#archivos2').prop('files')[0];
        let id = $("#idClienteInfo").text();

        if(archivo2 != undefined) {
            var form_data = new FormData();
                        
            form_data.append('file', archivo2);

            /* Cargar archivo */
            let respuesta = cargarArchivo(form_data)
            let json = JSON.parse(respuesta);
            let direccion = json.url;

            if(json.carga)
            {
                let fecha_carga = getFecha();
                let idComprobante = $("#idComprobante").text();

                let datos = 
                {
                    "id_cl": id_cl, 
                    "dir_archivo": direccion, 
                    "fecha_carga": fecha_carga,
                    "id_comprobante": idComprobante
                }
                let modificar = modificarArchivoEnBD(datos)
                let json = JSON.parse(modificar);
                
                //si la edición es correcta, se actualiza toda la información
                if(json.edicion)
                {
                    $("#modalCargarNuevoComprobante").modal("hide");    
                    let id = $("#idComprobante").html();
                    cargarNuevoComprobante(id, direccion);
                    cargarArchivosComprobantes(id_cl, tablaComprobantes);
                }
            }
            
        }
    }
    
    //Eliminar archivos

    /*//subir archivos
    
    
    let id_cl = $("#idCliente").text();
    let fecha_carga = getFecha();

    

    //registro de archivo en la BD */

});

function getFecha ()
{
  var hoy = new Date();
  //fecha
  let dia = hoy.getDate();
  let mes = hoy.getMonth()+1;
  let ano = hoy.getFullYear();
  if(dia<10)
  {
    dia = "0"+hoy.getDate();
  }
  if(mes<10)
  {
    mes = "0"+mes;
  }
  var fecha = ano+"-"+mes+"-"+dia;
  return fecha;
}