
/* --------------------------------------- FUNCION AJAX ---------------------------------------------- */

function crearProductoAjax(datos)
{
    return $.ajax({
        url:"funciones/crear_producto_exe.php",
        data: datos,
        type: "POST",
        async: false,
    }).responseText;

}



/* ----------------------------------------- FUNCIONES DOM --------------------------------------- */
//abrir modal de registro

$("#btnAgregarCategoria").on("click", function(e)
{
    $("#modalRegistro").modal("show");
    let proveedores = cargarProveedores();
    $("#slctProveedor").html(proveedores);
})



//Función de registro

$("#formRegistroProducto").submit(function(e)
{
    e.preventDefault();
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

    datos = 
    {
        "nomProd":np,
        "cat":lc,
        "can":can,
        "vn":vn,
        "vv":vv,
        "cod_barra":cb,
        "rp":rp,
        "unidad":unidad,
        "pesaje":rp,
        "marGan":margenGanancia,
        "monGan":montoGanancia,
        "proveedor":proveedor
    }


    if(lc=="O"||cb=="O")
    {
        if(lc=="O")
        {
            msjes_swal("Aviso", "Debe seleccionar una categoría válida.", "warning");
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
            let registro_producto = crearProductoAjax(datos);
            let json = JSON.parse(registro_producto);

            msjes_swal(json.titulo, json.mensaje, json.icono);

            if(json.registro)
            {
                $('#producto').DataTable().ajax.reload();
                $("#formRegistro").trigger('reset');
                $("#modalRegistro").modal("hide");
                $("#formRegistroProducto").trigger("reset");
            }
        }
    }
});