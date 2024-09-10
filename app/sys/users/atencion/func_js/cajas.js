
function obtener_cajas()
{
  $.ajax(
  {
    url: 'func_php/read_cajas.php',
    type: 'GET',
    success: function(response)
    {
      let tasks = JSON.parse(response);
      let template = '';

      //Se valida si la variable tasks es un arreglo válido o no
      if(Array.isArray(tasks))
      {
        tasks.forEach(task=>{
          clase = "";
          if(task.estado=="S")
          {
            clase = "btn-primary";
          }
          if(task.estado=="A")
          {
            clase = "btn-danger";
          }
          template+=
          `<button class='btn ${clase}'  style='margin: 2px'  nroCaja=${task.id} nomCaja=${task.nombre}><h1>${task.nombre}</h1></button>`;
        });
      }
      $("#cajas").html(template);
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
