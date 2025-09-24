<?php
    session_start();
    if(isset($_GET["tipoVenta"])||isset($_GET["idMesa"]))
    {
        $tipoVenta = $_GET["tipoVenta"];
        $idMesa = $_GET["idMesa"];
    }
    else
    {
        $tipoVenta = null;
        $idMesa = null;
    }
    

    require_once '../../../conexion.php';

    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
  

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--   <meta content="IE=edge" http-equiv="X-UA-Compatible"> -->
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <link href="ico/favicon.ico" rel="shortcut icon">
    <?php require "../cdn_css/css/css_item.php"?>

    <title>.:VendeloPOS Administrador:.</title>


</head>

<body role="document">
    <span id=opcion style="display: none">1</span>
    <span id=id_usuario style="display: none"><?php echo $id_us;?></span>
    <span id=nCaja style="display: none"><?php echo $_GET["id"];?></span>

    <?php 
        require "../menu/sesion_item.php";
    ?>
.
    <!-- Comtainer -->
    <div class="container-fluid paper-wrap bevel tlbr">
        <!-- SIDE MENU -->
        <div class="wrap-sidebar-content">
            <?php
                require "../menu/top_menu_item.php";
            ?>
            <!-- CONTENT -->
            <div class="wrap-fluid" id="paper-bg">
                <div class="row">
                    <?php require "items_index/modals/llamado_modals.php";?>
                    <div class="col-md-12">
                        <div class="card card-warning" id="">
                            <div class="card-body">
                                <?php require "items_index/modulo_venta/titulo.php"?>
                                <div class="col-lg-9">
                                    <?php require "items_index/botones/botones_index.php"?>
                                    <?php require "items_index/producto/producto.php"?>
                                    <?php require "items_index/modulo_venta/modulo_venta.php"?>
                                </div>
                                <div class="col-lg-3">
                                    <?php require "items_index/modulo_pago/modulo_pago.php"?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/paper bg -->
        </div>
        <!-- ./wrap-sidebar-content -->

        <!-- / END OF CONTENT -->

    </div>
 <!-- Container -->

    <!-- 
    ================================================== -->
    <!-- Main jQuery Plugins -->
    <?php require "../cdn_css/cdn/cdn_item.php";?>
    
    <!--Formatear número-->
    <script src="../../../js/numberFormat.js"></script>

    <!--Datatables-->
    <script type="text/javascript" src="../../../datatables/datatables.js"></script>

    <!--Select2-->
    <script type="text/javascript" src="../../../js/select2.js"></script>

    <!--Moments-->
    <script src='../../../js/moment/moment.js' type='text/javascript'></script>
    
    <!--Full Calendar-->
    <script src='../../../js/fullcalendar/dist/fullcalendar.js' type='text/javascript'></script>

    <!--llamada a ventas-->
    <script src="js/venta/crear/obtener_id_item_venta.js"></script>
    <script src="js/venta/crear/obtener_id_item_venta.js"></script>
    <script src="js/venta/crear/accion_guardar_venta.js"></script>
    <script src="js/promociones/cargar_estado_promocion.js"></script>
    <script src="js/promociones/leer_numero_unids_producto_venta.js"></script>
    <script src="js/promociones/leer_numero_unids_producto.js"></script>
    <script src="js/promociones/leer_precio_promo.js"></script>
    <script src="js/promociones/aplicar_promo.js"></script>
    <script src="js/descuento/cargarDescuento.js"></script>
    <script src="js/descuento/aplicarDescto.js"></script>
    <script src="../../../js/validarRut.js"></script>
    <script src="js/venta/editar/anularVenta.js"></script>
    <script src="js/correlativo/correlativo.js"></script>
    <script src="js/caja_atencion/cerrarCaja.js"></script>
    <script src="js/caja_atencion/crear/crear_movimiento.js"></script>
    <script src="js/caja_atencion/leer/leer_movimiento_caja.js"></script>
    <script src="js/venta/leer/cargarIDVenta.js"></script>
    <script src="js/fecha_hora/getFechaHora.js"></script>
    <script src="js/stock/comprobar_estado_stock_minimo.js"></script>
    <script src="js/turno/cargarNombreIdCajaAbierta.js"></script>
    <script src="js/metodoPago/cargarMetodoPago.js"></script>
    <script src="js/producto/cargarProducto.js"></script>
    <script src="js/venta/leer/cargarVentasCaja.js"></script>
    <script src="js/venta/clave_aut/clave_aut.js"></script>
    <script src="js/venta/eliminar/eliminar_venta_ajax.js"></script>
    <script src="js/venta/eliminar/eliminar_venta_autorizacion.js"></script>
    <script src="js/venta/eliminar/eliminarVenta.js"></script>
    <script src="js/imprimir/primera_impresion/imprCtaGeneral.js"></script>
    <script src="js/cantidad/js/actualizar_pesaje.js"></script>
    <script src="js/cantidad/js/funcion_actualizar_cantidad_bd.js"></script>
    <script src="js/cantidad/js/accion_actualizar_cantidad_bd.js"></script>
    <script src="js/cantidad/js/obtener_id_venta.js"></script>
    <script src="js/cantidad/js/comprobar_cantidad.js"></script>
    <script src="js/cantidad/js/agregar_cantidad.js"></script>
    <script src="js/cantidad/js/modificar_cantidad.js"></script>
    <script src="js/metodoPago/validarMetodoPago.js"></script>
    <script src="js/permisos/permisos.js"></script>
    <script src="js/venta/leer/verificar_id_crear_venta.js"></script>
    <script src="js/venta/app/ventas.js"></script>
    <script src="js/venta/crear/crear_nueva_venta.js"></script>
    <script src="js/venta/crear/registrar_pago.js"></script>
    <script src="js/venta/crear/aplicar_descuento.js"></script>
    <script src="js/pistola/pistolaCodigoBarra.js"></script>
    <script src="js/venta/crear/registrarVenta.js"></script>
    <script src="js/stock/cargarNumeroStockMinimo.js"></script>
    <script src="js/imprimir/primera_impresion/imprimir.js"></script>
    <script src="js/cliente/datosCliente.js"></script>
    <script src="js/cliente/agregarCliente.js"></script>
    <script src="js/rut/validarVariableRut.js"></script>
    <script src="js/cliente/agregarACuentaCliente.js"></script>
    <script src="js/pagos/cuentas/confirmar_paga_cuenta.js"></script>
    <script src="js/pagos/cuentas/pagarCuenta.js"></script>
    <script src="js/pagos/pago/confirmarPaga.js"></script>
    <script src="js/pagos/desc_prod/desc_prod.js"></script>
    <script src="js/vuelto/calcularVuelto.js"></script>
    <script src="js/caja_atencion/resumenCaja.js"></script>
    <script src="js/precio/consultarPrecio.js"></script>
    <script src="js/venta/leer/comprobarPrimeraVenta.js"></script>
    <script src="js/venta/leer/contador_ventas.js"></script>
    <script src="js/venta/leer/obtener_precio_producto.js"></script>
    <script src="js/caja_dinero/confirmarMontoInicialCaja.js"></script>
    <script src="js/caja_atencion/movimientoCaja.js"></script>
    <script src="js/producto/descontar_producto.js"></script>
    <script src="js/stock/cargar_stock_minimo.js"></script>
    <script src="js/imprimir/reimprimir_boleta/cargar_año_boleta.js"></script>
    <script src="js/imprimir/reimprimir_boleta/cargar_mes_boleta.js"></script>
    <script src="js/imprimir/reimprimir_boleta/cargar_dias_boleta.js"></script>
    <script src="js/imprimir/calendario/calendario.js"></script>
    <script src="js/imprimir/reimprimir_boleta/cargar_correlativo.js"></script>
    <script src="js/imprimir/reimpresion/reimpresion.js"></script>
    <script src="js/producto/cargar_producto_busqueda.js"></script>
    <script src="js/cuenta_cliente/busqueda_datos_cliente.js"></script>
    <script src="js/cuenta_cliente/cargar_cuentas_cliente.js"></script>
    <script src="js/cuenta_cliente/checkbox/checkbox.js"></script>
    <script src="js/cuenta_cliente/pagar_cuenta/pagar_cuenta.js"></script>
    <script src="js/usuario/obtener_usuario.js"></script>
    <script src="js/promociones/aplicar_promo_actualizar_cantidad.js"></script>
    <script src="js/promociones/anular_promocion.js"></script>
    <script src="js/promociones/obtener_id_producto.js"></script>
    






</body>

</html>
