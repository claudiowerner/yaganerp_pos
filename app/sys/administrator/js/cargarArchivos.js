$("#btnCargarArchivo").on("click", function(e)
{
    e.preventDefault();

    //Todas las propiedades del Archivo
    //El método prop() nos sirve para poder modificar las propiedades nativas de Javascript 
    //de los elementos de una página, Ejemplo $('#checkbox1').prop("checked", true);
    
    //subir archivos
    let dir_archivo;
    var archivo = $('#archivo').prop('files')[0];

    if(archivo != undefined) {
        var form_data = new FormData();
                      
        form_data.append('file', archivo);
        console.log(form_data);
        $.ajax({
            type: 'POST',
            url: 'php/cliente/cargarArchivos.php',
            contentType: false,
            processData: false,
            data: form_data,
            async: false,
            success:function(e) {
                dir_archivo = e;
            }
        });
    }
    
    let id_cl = $("#idCliente").text();
    let fecha_carga = getFecha();

    let datos = 
    {
        "id_cl": id_cl, 
        "dir_archivo": dir_archivo,
        "fecha_carga": fecha_carga
    }

    //registro de archivo en la BD
    $.ajax(
        {
            url: "php/cliente/registrarArchivoBD.php",
            data: datos,
            type: "POST",
            success: function(e)
            {
                msjes_swal("Excelente",e,"success");
            }
        }
    )
    .fail(function(e)
    {
        msjes_swal("Error",e.responseText,"error");
    })

    cargarArchivosComprobantes();

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