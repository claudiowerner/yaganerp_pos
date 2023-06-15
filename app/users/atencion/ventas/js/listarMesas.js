obtener_pisos_cambio_mesa();
$("#prod").select2();
function obtener_pisos_cambio_mesa()
{
  $.ajax(
  {
    url: '../func_php/read_pisos.php',
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
function obtener_ubicaciones(id_piso)
{
  $.ajax(
  {
    url: '../func_php/read_ubicaciones_exe.php?id_piso='+id_piso,
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
                url: '../func_php/read_mesas.php?nroUbic='+task.id,
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