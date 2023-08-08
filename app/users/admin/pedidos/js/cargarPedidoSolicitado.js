let arrCantidadEditar = Array(); 
let arrProductoEditar = Array(); 
let arrValorEditar = Array(); 
let arrayId = Array();
let c_id = 0;//contador para el index del arrId
let id_detalle_pedido = 0;//recibe el ID del detalle del pedido




function cargarPedido()
{
    id = $("#idModal").text();
    c_id=0;
    $.ajax({
        url:"read_detalle_pedido.php",
        data: {"id_pedido":id},
        type: "POST",
        async: false, 
        success: function(e)
        {
            body = "";
            try
            {
                json = JSON.parse(e);
                let valorPedido = 0;
                let valorxCantidad = 0;
                json.forEach(j=>
                {
                    let element = document.getElementById("slctProveedorEditar");
                    element.value = j.id_proveedor;
                    id_detalle_pedido = parseInt(j.id)+parseInt(1);
                    arrayId[c_id] = id_detalle_pedido;

                    //calculo del valor total del pedido

                    valorxCantidad = parseInt(j.valor) * parseInt(j.cantidad);
                    valorPedido = parseInt(valorPedido) + parseInt(valorxCantidad);
                    
                    body = body+
                    `<tr>
                        <td id="id_detalle_pedido" style='display: none'>${j.id}</td>
                        <td><input type='text' id='productoEditar${j.id}' class='nombre form form-control' placeholder='Ingrese nombre' value='${j.producto}'></td>
                        <td><input type='number' id='cantidadEditar${j.id}' class='cantidad form form-control' placeholder='Ingrese cantidad' value=${j.cantidad}></td>
                        <td><input type='number' id='valorEditar${j.id}' class='valor form form-control' placeholder='Ingrese valor' value=${j.valor}></td>
                        <td><button class='editar btn btn-primary'  onclick="editar(this,'S',${j.id})">Guardar editado</button></td>
                        <td><button class='eliminar btn btn-danger' onclick="eliminarEditar(${j.id})">-</button></td>
                    </tr>`; 
                    
                    c_id++;
                })
                $("#valorPedido").html(valorPedido);
            }
            catch(e)
            {
                body = "<tr><td id=0 colspan=4>Sin resultados</td></tr>";
                $("#valorPedido").html("0");
            }
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
        </tr>`;
        $("#0").remove()
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
    prod = $("#productoEditar"+id).val();
    cant = $("#cantidadEditar"+id).val();
    val = $("#valorEditar"+id).val();

    datos_modificar = {
        "id_detalle": id,
        "prod": prod,
        "cant": cant,
        "val": val,
    }


    datos_insertar = {
        "id_detalle": id,
        "prod": prod,
        "cant": cant,
        "val": val,
        "fecha": getFechaBD()
    }
    if(editar=='S')
    {
        $.ajax(
            {
                url: "editar_detalle_pedido.php",
                data: datos_modificar,
                type: "POST",
                success: function(e)
                {
                    alert(e);
                    cargarPedido();
                } 
            }

        )
    }
    else
    {
        $.ajax(
            {
                url: "insertar_detalle_pedido.php",
                data: datos_insertar,
                type: "POST",
                success: function(e)
                {
                    alert(e);
                    cargarPedido();
                } 
            }

        )
    }
}

function eliminarEditar(detalle)
{
    for(i=0;i<2;i++)
    {
        $("#"+detalle).remove(); 
        arrProductoEditar = Array();//se reinicia esta variable
        arrCantidadEditar = Array();//se reinicia esta variable
        arrValorEditar = Array();//se reinicia esta variable
        let producto = $("#productoEditar"+detalle).val();
        if(producto!=undefined)
        {
            $.ajax(
                {
                    url: "eliminar_detalle.php",
                    data: {"id_detalle": detalle},
                    type: "POST",
                    async: false,
                    success: function(e)
                    {
                        cargarPedido()
                    }
                }
            )
        }
    }
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


$("#swEstadoPedido").on("click", function(e)
{
    let label = "";
    let estado = "";
    id = $("#idModal").text();
    if(e.target.checked)
    {
        label = "Hecho";
        estado = "C";
    }
    else
    {
        label = "Hacer";
        estado = "A";
    }
    datos = {
        "id": id,
        "estado": estado
    };
    $.ajax({
        url:"editar_estado_pedido.php",
        data: datos,
        type: "POST",
        success: function(e)
        {
            msjes_swal("Excelente", e, "success");
            $('#pedidos').DataTable().ajax.reload();
        }
    })
    $("#lblEstadoPedido").html(label);
})


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
