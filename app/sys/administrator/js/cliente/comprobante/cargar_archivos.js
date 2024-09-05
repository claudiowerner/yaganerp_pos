/* ------------------------------------------ FUNCIONES AJAX ---------------------------------------- */
function cargarArchivos(form_data)
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

function registrarArchivoBD(datos)
{
    return $.ajax({
        url: "php/cliente/comprobante/registrarArchivoBD.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}



/* ------------------------------------------- ACCIONES DOM ----------------------------------------- */
$("#btnCargarArchivo").on("click", function(e)
{
    e.preventDefault();

    //Todas las propiedades del Archivo
    //El método prop() nos sirve para poder modificar las propiedades nativas de Javascript 
    //de los elementos de una página, Ejemplo $('#checkbox1').prop("checked", true);
    
    let id_cl = $("#idClientePagar").text();
    let fecha_carga = getFecha();
    let periodo_plazo = $("#slctPeriodoComprobante").val();
    //subir archivos
    let dir_archivo;
    var archivo = $('#archivo').prop('files')[0];
    if(archivo != undefined && periodo_plazo != 0) {
        var form_data = new FormData();
                      
        form_data.append('file', archivo);
        let respuesta = cargarArchivos(form_data);
        let json = JSON.parse(respuesta);
        
        dir_archivo = json.url;
        
        //registro de archivo en la BD
        let datos = 
        {
            "id_cl": id_cl, 
            "dir_archivo": dir_archivo,
            "fecha_carga": fecha_carga,
            "periodo_plazo": periodo_plazo
        }
        respuesta = registrarArchivoBD(datos);
        try
        {
            let j = JSON.parse(respuesta);
            msjes_swal(j.titulo, j.mensaje, j.icono);
            $('#tablaComprobantes').DataTable().ajax.reload();
            cargarPeriodosComprobante(id_cl);
        }
        catch(e)
        {
            msjes_swal(respuesta);
        }
    }
    else
    {
        msjes_swal("Aviso", "El archivo y/o el periodo de pago seleccionado deben ser válidos", "warning");
    }
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