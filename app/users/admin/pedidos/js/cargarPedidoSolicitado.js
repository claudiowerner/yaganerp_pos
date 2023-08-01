let arrCantidadEditar = Array(); 
let arrProductoEditar = Array(); 
let arrValorEditar = Array(); 
let arrayId = Array();
let c_id = 0;//contador para el index del arrId
function cargarPedido(id)
{
    c_id=0;
    $.ajax({
        url:"read_detalle_pedido.php",
        data: {"id_pedido":id},
        type: "POST",
        async: false, 
        success: function(e)
        {
            arrId = Array();
            
            body = "";
            json = JSON.parse(e)
            json.forEach(j=>
                {
                    let element = document.getElementById("slctProveedorEditar");
                    element.value = j.id_proveedor;
                    id = j.id;
                    arrayId[c_id] = id;
                    
                    //rellenar arrId


                    body = body+
                    `<tr>
                        <td id=${j.id} style='display: none'>id=${j.id}</td>
                        <td><input type='text' id='producto${j.id}' list='${j.id}' class='nombre form form-control' placeholder='Ingrese nombre' value='${j.producto}'></td>
                        <td><input type='number' id='cantidad${j.id}' list='${j.id}' class='cantidad form form-control' placeholder='Ingrese cantidad' value=${j.cantidad}></td>
                        <td><input type='number' id='valor${j.id}' list='${j.id}' class='valor form form-control' placeholder='Ingrese valor' value=${j.valor}></td>
                        <td><button class='editar btn btn-primary' onclick='editar(this,${j.id})'>Guardar editado</button></td>
                        <td><button id='${j.id}' class='eliminar btn btn-danger' onclick='eliminar(this,${j.id})'>-</button></td>
                    </tr>`; 
                    
                    c_id++;
                })

            $("#bodyPedidosEditar").html(body)
        }
    })
}

function rellenarTablaDinamicaEditar(id)
{
    body = "";

    //rellenar arrProducto
    rellenarArrayEditar(arrProductoEditar, arrCantidadEditar, arrValorEditar);
    //rellenar tabla dinámica
    for(i=0;i<c_id;i++)
    {
        body = body+
        `<tr>
            <td id=${arrayId[i]} style='display: none'>id=${arrayId[i]}</td>
            <td><input type='text' id='producto${arrayId[i]}' list='${arrayId[i]}' class='nombre form form-control' placeholder='Ingrese nombre' value=${arrProductoEditar[i]}></td>
            <td><input type='number' id='cantidad${arrayId[i]}' list='${arrayId[i]}' class='cantidad form form-control' placeholder='Ingrese cantidad' value=${arrCantidadEditar[i]}></td>
            <td><input type='number' id='valor${arrayId[i]}' list='${arrayId[i]}' class='valor form form-control' placeholder='Ingrese valor' value=${arrValorEditar[i]}></td>
            <td><button class='editar btn btn-primary' onclick='editar(this,${arrayId[i]})'>Guardar editado</button></td>
            <td><button class='eliminar btn btn-danger' onclick='eliminarEditar(this,${arrayId[i]})'>-</button></td>
        </tr>`; 
    }
    $("#bodyPedidosEditar").html(body);
    
}

$("#btnAgregarProductoEditar").on("click", function(e)
{
    e.preventDefault();
    arrayId[c_id++] = c_id;
    rellenarTablaDinamicaEditar(id);
    comprobarId0(id);
})


function eliminarEditar(boton, e)
{
    $("#"+e).remove();
    arrProducto = Array();//se reinicia esta variable
    arrCantidad = Array();//se reinicia esta variable
    arrValor = Array();//se reinicia esta variable
    rellenarTablaDinamicaEditar(arrProductoEditar,arrCantidadEditar, arrValorEditar);
    comprobarId0(id);
}





function rellenarArrayEditar(arrProductoEditar, arrCantidadEditar, arrValorEditar)
{
    for(i=0;i<c_id;i++)
    {
        producto = $("#producto"+(arrayId[i])).val();
        if(producto!=undefined)
        {
            arrProductoEditar[i] = producto;
        }
        else
        {
            arrProductoEditar[i] = "";
        }
    }
    
    for(i=0;i<c_id;i++)
    {
        cantidad = $("#cantidad"+(arrayId[i])).val();
        if(cantidad!=undefined)
        {
            arrCantidadEditar[i] = cantidad;
        }
        else
        {
            arrCantidadEditar[i] = "";
        }
    }
    
    for(i=0;i<c_id;i++)
    {
        valor = $("#valor"+(arrayId[i])).val();
        if(valor!=undefined)
        {
            arrValorEditar[i] = valor;
        }
        else
        {
            arrValorEditar[i] = "";
        }
    }
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
