table = $('#producto').DataTable({
  "ajax":{
    "url":"scripts/read_usuarios.php",
    "type":"GET",
    "dataSrc":""
    },
    //columnas
    "columns":[
      {"data":"item"},
      {"data":"nombre"},
      {"data":"user"},
      {"data":"tipo_usuario"},
      {"data":"estado"},
      {"data":"permisos"},
      {
        "defaultContent": '<button type="submit" class="btn btn-primary editar" id="btnEditar"><img src="../img/edit.png" width="15"></button>'
      }
    ],
    
    //Configuración de Datatable
    "iDisplayLength": 10,
    "language": {
      "lenghtMenu":"Mostrar _MENU_ registros",
      "zeroRecords": "No se encontraron resultados.",
      "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "infoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sSearch":"Buscar",
      "oPaginate":{
        "sFirst":"Primero",
        "sLast":"Último",
        "sNext":"Siguiente",
        "sPrevious":"Anterior"
      }
    }
  }
);

$(document).on("ready", function(e)
{
  cargarUsuariosActivos();
  cargarUsuariosPermitidos();
  validarUsuariosActivos();
  var table;
  //Datatable
  var idCat = 0;
  

  

  $("#producto").on("click", "tr", function(e)
  {
    e.preventDefault();
    var usuarios = $("#producto").DataTable();
    var datos = usuarios.row(this).data();
    let id = datos.id;
    permisosEditar = Array();

    //proceso de checkeo de checkbox de permisos
    $.ajax(
      {
        url:"scripts/../../read_permisos_usuario.php",
        data:{"id_usu":id},
        type:"POST",
        success: function(e)
        {
          if(e.match(/1/))
          {
            $("#venderEditar").prop("checked", true);
            permisosEditar.push(1);
          }
          else
          {
            $("#venderEditar").prop("checked", false);
          }
          if(e.match(/2/))
          {
            $("#pagarMesaEditar").prop("checked", true);
            permisosEditar.push(2);
          }
          else
          {
            $("#pagarMesaEditar").prop("checked", false);
          }
          if(e.match(/3/))
          {
            $("#anularVentaEditar").prop("checked", true);
            permisosEditar.push(3);
          }
          else
          {
            $("#anularVentaEditar").prop("checked", false);
          }
          if(e.match(/4/))
          {
            $("#cambiarMesaEditar").prop("checked", true);
            permisosEditar.push(4);
          }
          else
          {
            $("#cambiarMesaEditar").prop("checked", false);
          }
        }
      }
    )

    $("#modalEditar").modal('show'); 
    $("#nomUserEditar").val(datos.nombre);
    $("#userEditar").val(datos.user);
    $("#slctTipoUsuarioEditar").val(datos.tipo_usuario);
    if(datos.estado=="ACTIVADO")
    {
      $("#slctEstado").val("S");
    }
    else
    {
      $("#slctEstado").val("N");
    }
    
    $("#usuario").html(datos.user);

  });

  //cambiar permisos para editar


  $("#venderEditar").on("click", function(e)
  {
    if(e.target.checked)
    {
      permisosEditar.push(1);
    }
    else
    {
      permisosEditar = permisosEditar.filter(user => user != 1)
    }
    permisosEditar.sort();
    
    
  })

  $("#pagarMesaEditar").on("click", function(e)
  {
    if(e.target.checked)
    {
      permisosEditar.push(2);
    }
    else
    {
      permisosEditar = permisosEditar.filter(user => user != 2)
    }
    permisosEditar.sort();
  })

  $("#anularVentaEditar").on("click", function(e)
  {
    if(e.target.checked)
    {
      permisosEditar.push(3);
    }
    else
    {
      permisosEditar = permisosEditar.filter(user => user != 3)
    }
    permisosEditar.sort();
  })

  $("#cambiarMesaEditar").on("click", function(e)
  {
    if(e.target.checked)
    {
      permisosEditar.push(4);
    }
    else
    {
      permisosEditar = permisosEditar.filter(user => user != 4)
    }
    permisosEditar.sort();
    permisos.sort();
  })

  
  $("#btnModificar").on("click", function(e)
  {
    let user = $("#usuario").text();//nickname de usuario antiguo
    let user_n = $("#userEditar").val();//nickname de usuario nuevo
    let nombre = $("#nomUserEditar").val();//nombre de usuario
    let pass = $("#passEditar").val();
    let cPass = $("#cPassEditar").val();
    let estado = $("#slctEstado").val();
    let tu = $("#slctTipoUsuarioEditar").val();
    permisosEditar = permisosEditar.toString();

    if(pass!=cPass)
    {
      $("#lblMsjEditar").html("<strong style='color: red'>Las contraseñas ingresadas no coinciden entre sí.</strong>");
      $("#passEditar").val("");
      $("#cPassEditar").val("");
      $("#passEditar").focus();
    }
    else
    {
      $("#lblMsjEditar").html("");
      let datos = {
        "user":user,
        "user_n":user_n,
        "nombre":nombre,
        "pass":pass, 
        "estado":estado,
        "tu":tu,
        "permisos":permisosEditar
      }
      //validar si se excede de la cuota de usuarios permitidos o no
      estado = $("#slctEstado").val();

      if(estado=="S")
      {
        validarUsuariosActivos();
        modificar(datos);
      }
      if(estado=="N")
      {
        modificar(datos);
      }
    }
  });

})
function modificar(datos)
{
  $.ajax(
    {
      url:"scripts/editar_usuario.php",
      data:datos,
      type:"POST",
      success: function(e)
      {
        msjes_swal("Excelente", e, "success");
        $("#modalEditar").modal("hide");
        $('#producto').DataTable().ajax.reload();
        cargarUsuariosActivos();
        validarUsuariosActivos();
      }
    })
    .fail(function(e)
    {
      msjes_swal("Error",e,"error")
    })
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
