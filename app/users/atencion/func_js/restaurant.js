

  //activar/desactivar boton venta convenio
  convenio = "";
  $.ajax({
    url: "func_php/config_convenio.php",
    type: "POST",
    success: function(e)
    {
      convenio = e;
    }
  })
  let id = "";
  let fecha = getFecha();
  let hora = getHora();
  let ubic = "";
  let tipoVenta = "";
  let nomMesa = "";

  $.ajax({
    url: "caja/caja.php?fecha="+fecha+"&hora="+hora, 
    type: "GET",
    success: function(e)
    {
      if(e=="0"||e.match(/0/))
      {
        $("#restaurant").html(`<div align=center class="card bg-gradient-danger">
              <div class="card-header">
                <h3 align="center" class="card-title"><strong>EL SISTEMA SE BLOQUEÓ</strong></h3>
              </div>
              <div class="card-body">
                Esto se debe a que no existe ninguna apertura de caja activa, o bien, la caja correspondiente a la fecha ${fecha}/${hora} no se creó correctamente.<br> Para poder continuar, <strong>solicite al administrador de sistema que cree otra apertura de caja o modifique la caja creada</strong> y así, poder operar con normalidad.
              </div>
              <!-- /.card-body -->
            </div>`);
      }
      if(e==1)
      {
        obtener_pisos();
      }
    }
  })
  $("#prod").select2();
  function obtener_pisos()
  {
    $.ajax(
    {
      url: 'func_php/read_pisos.php',
      type: 'GET',
      success: function(response)
      {
        let tasks = JSON.parse(response);
        let template = '';
        tasks.forEach(task=>{
          template+=`
          <div class="row">
            <div class="col-lg-12">
              <h3 class="card-title">${task.nombre}</h3>
                <div class="plan">
                  <div class="col-md-12">
                    <div class="card card-warning" id="${task.id}">
                      <div class="card-header">
                      </div>
                    <div class="card-body" id=ubicPiso${task.id}>`
                      +obtener_ubicaciones(task.id)+`
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>`;
        });
        $("#restaurant").html(template);
      }
    })
    .done( function() {
      console.log( 'Success!!' );
    }).fail( function(resp) {
      console.log( 'Error!! '+resp.ResponseText );
    }).always( function() {
      console.log( 'Always' );
    });
  };

  //arreglo obtener ID
  let array = new Array();
  function obtener_ubicaciones(id_piso)
  {
    $.ajax(
    {
      url: 'func_php/read_ubicaciones_exe.php?id_piso='+id_piso,
      type: 'GET',
      success: function(response)
      {
        if(response.match("s/r")||response.match(null))
        {
          $("#ubicPiso"+id_piso).html("Sin ubicaciones");
        }
        else
        {
          let tasks = JSON.parse(response);
          
          let template = '';
          if(Array.isArray(tasks))
          {
            tasks.forEach(task=>{
                  template+=`
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">${task.nombre}</h3>
                            <div class="card-tools">
                            </div>
                            <!-- /.card-tools -->
                          </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row" id=${task.nombre}>
                            
                          </div>
                        </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card --> 
                  </div>`;
                  $("#ubicPiso"+id_piso).html(template);
                $.ajax(
                {
                  url: 'func_php/read_mesas.php?nroUbic='+task.id,
                  type: 'GET',
                  success: function(response)
                  {
                    if(response.match("s/r"))
                    {
                      $("#"+task.nombre).html("Sin mesas");
                    }
                    if(!response.match("s/r"))
                    {
                      let template_mesas = '';
                      let tasks = JSON.parse(response);
                      if(Array.isArray(tasks))
                      {
                        tasks.forEach(t=>{
                          let estado_mesa ='';
                          let data_toggle='';
                          let data_target='';
                          let clase = '';
                          if(t.estado_gral == 'A')
                          {
                            estado_mesa = 'bg-danger';
                            data_toggle = 'data-toggle="modal" ';
                            data_target = 'data-target="#accionVentaMesaOcupada"';
                            clase = 'mOcupada btn btn-danger';
                          }
                          else
                          {
                            estado_mesa = 'bg-info';
                            clase = 'mDesocupada btn btn-primary';

                          }
                          template_mesas +=
                            `<button id="${t.id}" style="width='50px'" class="${clase}" nom_mesa=${t.nom_mesa}  ubic="${t.ubicacion}">
                                <h1>${t.nom_mesa}</h1>
                              </button>`;
                          });
                          $("#"+task.nombre).html(template_mesas);
                        }
                      }
                    }
                  })
              .done( function() {
                console.log( 'Success mesas!!' );
              })
              .fail( function(resp) {
                console.log( 'Error!! '+resp.responseText );
              }).always( function() {
                console.log( 'Always' );
              });
            })
          }
        }
      }
    }
  )
  .done( function() {
    console.log( 'Success!!' );
  })
  .fail( function(resp) {
    console.log( 'Error!! '+resp.ResponseText );
  })
  .always( function() {
    console.log('Always');
  });
};
$(document).on('click', '.mDesocupada', function(e)
  {
    id = $(this).attr('id');
    nomMesa = $(this).attr("nom_mesa");
    ubic = $(this).attr("ubic");
    $("#nMesa").html(id);
    $("#ubic").html(ubic);

    //se verifica si existe convenio activado ono y de acuerdo a eso se dirije directamente a la venta
    // o se consulta por el tipo de venta

    if(convenio.match("N"))
    {
      ventaNormal(e,id,nomMesa);
    }
    else
    {
      $("#modalConvenio").modal("show");
    }
  });

  $(document).on('click', '.mOcupada', function()
  {
    id = $(this).attr('id');
    ubic = $(this).attr('ubic');
    nomMesa = $(this).attr("nom_mesa");

    location.href = "ventas/index.php?id="+id+"&nomMesa="+nomMesa+"&nomMesa="+nomMesa+"&tipoVenta=&idMesa="+id+"&idUbic="+ubic;
  });

  $("#ventaNormal").on('click',function(e)
  {
    ventaNormal(e,id,nomMesa,ubic);
  });

  $("#btnVentaConvenio").on('click',function()
  {
    let id = $("#nMesa").text();
    tipoVenta = "C";

    //CREAR CORRELATIVO
    let hora = getHora();
    $.ajax({
      url: "correlativo/correlativo.php?nMesa="+id+"&ubic="+ubic+"&hora="+hora+"&tipoVenta="+tipoVenta,
      type: "GET",
      success: function(r)
      {
        location.href = "ventas/index.php?id="+id+"&nomMesa="+nomMesa+"&tipoVenta="+tipoVenta+"&idUbic="+ubic
      }
    })
    .done(function(){
      console.log("Done correlativo convenio");
    })
    .fail(function(r)
    {
      console.log("fail correlativo convenio: "+r.responseText)
    })
  });


  function getHora()
  {
    var hoy = new Date();
    //hora
    var h = hoy.getHours();
    var min = hoy.getMinutes();
    var sec = hoy.getSeconds();
    if(hora<10)
    {
      h = '0'+h;
    }
    if(min<10)
    {
      min = '0'+min;
    }
    if(sec<10)
    {
      sec = '0'+sec;
    }
    var hora = h+":"+min+":"+sec;
    return hora;
}

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
    mes = "0"+hoy.getMonth();
  }
  var fecha = ano+"-"+mes+"-"+dia;
  return fecha;
}

function ventaNormal(e,id)
{
  console.log(e)
  tipoVenta = "N";

  //CREAR CORRELATIVO
  let hora = getHora();
  $.ajax({
    url: "correlativo/correlativo.php?nom_mesa="+nomMesa+"&id_mesa="+id+"&ubic="+ubic+"&hora="+hora+"&tipoVenta="+tipoVenta,
    type: "GET",
    success: function(r)
    {
      location.href = "ventas/index.php?id="+id+"&nomMesa="+nomMesa+"&tipoVenta="+tipoVenta+"&idMesa="+id+"&idUbic="+ubic;
    }
  })
  .done(function(){
    console.log("Done correlativo");
  })
  .fail(function(r)
  {
    console.log("fail correlativo: "+r.responseText)
  })
}