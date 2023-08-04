let arrCantidadEditar = Array(); 
let arrProductoEditar = Array(); 
let arrValorEditar = Array(); 
let arrayId = Array();
let c_id = 0;//contador para el index del arrId
let id_detalle_pedido = 0;//recibe el ID del detalle del pedido
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
            body = "";
            json = JSON.parse(e)
            json.forEach(j=>
                {
                    let element = document.getElementById("slctProveedorEditar");
                    element.value = j.id_proveedor;
                    id_detalle_pedido = parseInt(j.id)+parseInt(1);
                    arrayId[c_id] = id_detalle_pedido;
                    
                    body = body+
                    `<tr>
                        <td id=${j.id} style='display: none'>${j.id}</td>
                        <td><input type='text' id='productoEditar${j.id}' class='nombre form form-control' placeholder='Ingrese nombre' value='${j.producto}'></td>
                        <td><input type='number' id='cantidadEditar${j.id}' class='cantidad form form-control' placeholder='Ingrese cantidad' value=${j.cantidad}></td>
                        <td><input type='number' id='valorEditar${j.id}' class='valor form form-control' placeholder='Ingrese valor' value=${j.valor}></td>
                        <td><button class='editar btn btn-primary'  onclick="editar(this,'S',${j.id})">Guardar editado</button></td>
                        <td><button class='eliminar btn btn-danger' onclick="eliminarEditar(${j.id})">-</button></td>
                    </tr>`; 
                    
                    c_id++;
                })

            $("#bodyPedidosEditar").html(body)
        }
    })
}

function rellenarTablaDinamicaEditar(arrProductoEditar,arrCantidadEditar, arrValorEditar)
{
    c_id++;
    body = "";
    //rellenar arrProducto
    rellenarArrayEditar(arrProductoEditar, arrCantidadEditar, arrValorEditar);
    //rellenar tabla dinámica
    body = body+
        `<tr id='${c_id}'>
            <td><input type='text' id='productoEditar${c_id}' class='nombre form form-control' placeholder='Ingrese nombre' value=''></td>
            <td><input type='number' id='cantidadEditar${c_id}' class='cantidad form form-control' placeholder='Ingrese cantidad' value=''></td>
            <td><input type='number' id='valorEditar${c_id}' class='valor form form-control' placeholder='Ingrese valor' value=''></td>
            <td><button class='editar btn btn-primary' onclick="editar(this,'N',${c_id})">Guardar editado</button></td>
            <td><button class='eliminar btn btn-danger' onclick='eliminarEditar(${c_id})'>-</button></td>
        </tr>
        <tr id='${(c_id+1)}' style='display: none'>
            <td><input type='text' id='productoEditar${(c_id+1)}' class='nombre form form-control' placeholder='Ingrese nombre' value=''></td>
            <td><input type='number' id='cantidadEditar${(c_id+1)}' class='cantidad form form-control' placeholder='Ingrese cantidad' value=''></td>
            <td><input type='number' id='valorEditar${(c_id+1)}' class='valor form form-control' placeholder='Ingrese valor' value=''></td>
            <td><button class='editar btn btn-primary' onclick="editar(this,'N',${(c_id+1)})">Guardar editado</button></td>
            <td><button class='eliminar btn btn-danger' onclick='eliminarEditar(${(c_id+1)})'>-</button></td>
        </tr>`;
    $("#bodyPedidosEditar").append(body);
    
}

$("#btnAgregarProductoEditar").on("click", function(e)
{
    e.preventDefault();
    rellenarTablaDinamicaEditar(arrProductoEditar, arrCantidadEditar, arrValorEditar);
    comprobarId0(id);
})

function editar(e, editar, id)
{
    if(editar=='S')
    {
        alert("Se edita");
    }
    else
    {
        alert("Se inserta");
    }
}

function eliminarEditar(detalle)
{
    alert(detalle)
    $("#"+detalle).remove(); 
    arrProductoEditar = Array();//se reinicia esta variable
    arrCantidadEditar = Array();//se reinicia esta variable
    arrValorEditar = Array();//se reinicia esta variable
    $.ajax(
        {
            url: "eliminar_detalle.php",
            data: {"id_detalle": detalle},
            type: "POST",
            async: false,
            success: function(e)
            {
                //
            }
        }
    )
}





function rellenarArrayEditar(arrProductoEditar, arrCantidadEditar, arrValorEditar)
{
    for(i=0;i<c_id;i++)
    {
        producto = $("#productoEditar"+(arrayId[i])).val();
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
        cantidad = $("#cantidadEditar"+(arrayId[i])).val();
        if(cantidad!=undefined||cantidad!=0)
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
        valor = $("#valorEditar"+(arrayId[i])).val();
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
