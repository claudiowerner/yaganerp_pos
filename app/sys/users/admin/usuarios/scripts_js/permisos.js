//permisos de usuario
let permisos = Array();
let permisosEditar = Array();

$("#vender").on("click", function(e)
{
  if(e.target.checked)
  {
    permisos.push(1);
  }
  else
  {
    permisos = permisos.filter(user => user != 1)
  }
  permisos.sort();
  
})

$("#pagarMesa").on("click", function(e)
{
  if(e.target.checked)
  {
    permisos.push(2);
  }
  else
  {
    permisos = permisos.filter(user => user != 2)
  }
  permisos.sort();
  
})

$("#anularVenta").on("click", function(e)
{
  if(e.target.checked)
  {
    permisos.push(3);
  }
  else
  {
    permisos = permisos.filter(user => user != 3)
  }
  permisos.sort();
  
})

$("#cambiarMesa").on("click", function(e)
{
  if(e.target.checked)
  {
    permisos.push(4);
  }
  else
  {
    permisos = permisos.filter(user => user != 4)
  }
  permisos.sort();
  
})