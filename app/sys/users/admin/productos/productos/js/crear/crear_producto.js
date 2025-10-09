/* ----------------------------------------- FUNCIONES DOM --------------------------------------- */
//abrir modal de registro

$("#btnAgregarCategoria").on("click", function(e)
{
    $("#modalRegistro").modal("show");
    let proveedores = cargarProveedores();
    cargarCategoria(0);
    $("#slctProveedor").html(proveedores);
})



//Función de registro

$("#btnGuardar").on("click",function(e)
{
    e.preventDefault();

    if($("#swPesaje").is(':checked'))
    {
        rp = "S";
    }

    var np = $("#nomProd").val();
    var lc = $("#listCat").val();
    var can = $("#cantidadProd").val();
    var vn = $("#valorNeto").val();
    var vv = $("#valorVenta").val();
    var cb = $("#codigoBarra").val();
    var margenGanancia = $("#margenGanancia").val();
    var montoGanancia = $("#montoGanancia").val();
    var unidad = $("#slctUnidad").val();
    var proveedor = $("#slctProveedor").val();
    let datos = 
    {
        "nomProd":np,
        "cat":lc,
        "can":can,
        "vn":vn,
        "vv":vv,
        "cod_barra":cb,
        "unidad":unidad,
        "rp":rp,
        "marGan":margenGanancia,
        "monGan":montoGanancia,
        "proveedor":proveedor
    }
    console.log(datos)


    if(can==""||can=="0"||cb==""||margenGanancia==""||montoGanancia==""||proveedor==""||vn==""||vv==""||lc==0)
    {
        if(rp=="S"&&unidad==0)
        {
            msjes_swal("Aviso", "Debe rellenar todos los campos e indicar opciones válidas, incluyendo el tipo de unidad", "warning");
        }
        else
        {
            msjes_swal("Aviso", "Debe rellenar todos los campos e indicar opciones válidas", "warning");
        }
    }
    else
    {
        let producto_repetido = comprobarExistenciaCodigoBarra(cb);
        if(producto_repetido!=0)
        {
            msjes_swal("Aviso", "Ya existe un producto con código '"+cb+"'", "warning");
        }
        else
        {
            $.ajax({
                url:"productos/funciones/crear/crear_producto_exe.php",
                data: datos,
                type: "POST",
                success: function(e)
                {
                    let j = JSON.parse(e);

                    msjes_swal(j.titulo, j.mensaje, j.icono);

                    if(j.registro)
                    {
                        $('#producto').DataTable().ajax.reload();
                        $("#formRegistro").trigger('reset');
                        $("#modalRegistro").modal("hide");
                        $("#formRegistroProducto").trigger("reset");
                    }
                }
            })
        }
    } 
});