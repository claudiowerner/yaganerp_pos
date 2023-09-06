
let id = 0;
let body = "";
let arrId = Array();

let arrProducto = Array();
let arrCantidad = Array();
let arrValor = Array();


comprobarId0(id);

$("#btnAgregarProducto").on("click", function(e)
{
    id++;
    body = "";
    rellenarTablaDinamica(id);
    comprobarId0(id);
})
function eliminar(boton, e)
{
    console.log(boton.id)
    id--;
    $("#"+e).remove();
    arrProducto = Array();//se reinicia esta variable
    arrCantidad = Array();//se reinicia esta variable
    arrValor = Array();//se reinicia esta variable
    rellenarTablaDinamica(id);
    comprobarId0(id);
}

$("#btnGuardar").on("click", function(e)
{
    let proveedor = $("#slctProveedor").val();
    rellenarArray(arrProducto, arrCantidad, arrValor);
    //solicitud ajax
    datos = {
        "proveedor": proveedor,
        "fecha":getFechaBD(),
        "id":id,
        "producto": arrProducto,
        "valor": arrValor,
        "cantidad": arrCantidad
    }

    $.ajax({
        url:"crear_pedido.php",
        data: datos,
        type: "POST",
        success: function(e)
        {
            msjes_swal("Excelente", e, "success");
            $('#pedidos').DataTable().ajax.reload();
            $("#modalRegistro").modal("hide");
        }
    })
})


function rellenarArray(arrProducto, arrCantidad, arrValor)
{
    for(i=0;i<id;i++)
    {
        producto = $("#producto"+(i+1)).val();
        if(producto!=undefined)
        {
            arrProducto[i] = producto;
        }
        else
        {
            arrProducto[i] = "";
        }
    }
    
    for(i=0;i<id;i++)
    {
        cantidad = $("#cantidadProd"+(i+1)).val();
        if(cantidad!=undefined)
        {
            arrCantidad[i] = cantidad;
        }
        else
        {
            arrCantidad[i] = "";
        }
    }
    
    for(i=0;i<id;i++)
    {
        valor = $("#valor"+(i+1)).val();
        if(valor!=undefined)
        {
            arrValor[i] = valor;
        }
        else
        {
            arrValor[i] = "";
        }
    }
}



function rellenarTablaDinamica(id)
{
    body = "";
    //rellenar arrProducto
    rellenarArray(arrProducto, arrCantidad, arrValor);

    //rellenar tabla dinámica
    for(i=0;i<id;i++)
    {
        body = body+
        `<tr>
            <td>${(i+1)}</td>
            <td><input type='text' id='producto${(i+1)}' list='${(i+1)}' class='nombre form form-control' placeholder='Ingrese nombre' value=${arrProducto[i]}></td>
            <td><input type='number' id='cantidad${(i+1)}' list='${(i+1)}' class='cantidad form form-control' placeholder='Ingrese cantidad' value=${arrCantidad[i]}></td>
            <td><input type='number' id='valor${(i+1)}' list='${(i+1)}' class='valor form form-control' placeholder='Ingrese valor' value=${arrValor[i]}></td>
            <td><button id='${(i+1)}' class='eliminar btn btn-danger' onclick='eliminar(this,${(i+1)})'>-</button></td>
        </tr>`; 
    }
    $("#bodyPedidos").html(body);

    
}
function comprobarId0(id)
{
    if(id<=0)
    {
        $("#btnGuardar").prop("disabled", true);
    }
    else
    {
        $("#btnGuardar").prop("disabled", false);
    }
}


function getHora()
{
  var hoy = new Date();
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

function getFechaBD()
{
  var hoy = new Date();
  //fecha
  let dia = hoy.getDate();
  let mes = parseInt(hoy.getMonth())+parseInt(1);
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
