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
  $piso = 1;

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

    <title>WebPOS Venta CAJA <?php echo $_GET['nomCaja']?></title>

    <?php require "../cdn_css/css/css_item.php";?>
    
    <link rel='stylesheet' href='css/ventas.css'>


</head>

<body>
<span id="opcion" style="display:none">2</span>
    <?php require "../menu/sesion_item.php";?>
    <!-- END OF TOPNAV -->
    <!-- Comtainer -->
    
    <div class="row">
        <div class="row">
            <div class="col-md-12">
                <!-- SIDE MENU -->
                <div class="wrap-sidebar-content">
                    <!--Llamada modals-->
                    <?php
                        require_once "items_index/modals/llamado_modals.php";
                    ?>
                </div>
                <!-- CONTENT -->
                <div class="wrap-fluid" id="paper-bg">
                    <div class="col-lg-10" style='align:left' >
                        <table width=90%>
                            <tr>
                                <td width=90%><h1>Ventas</h1></td>
                                <td width=5%><button class='btn btn-secondary'><?php require_once "items_index/ventas/dropdown.php";?></button></td>
                            </tr>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                            <strong id="id_usuario" style="display: none"><?php echo $id_us?></strong>
                            <div class="row">
                                
                                <div class="col-lg-12">
                                    <div class="plan">
                                        <div class="col-md-12" id="div_ventas">
                                            <div class="card card-warning">
                                                <div>
                                                    <?php require_once "items_index/botones/botones_index.php";?>
                                                </div>
                                                <div>
                                                    <?php require_once "items_index/producto/producto.php";?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="plan">
                                        <div class="col-md-12">
                                            <div class="card card-warning">
                                                <div class="card-header" style="align:left;">
                                                    <table width="100%">
                                                        <tr>
                                                            <td>Venta <strong>CAJA </strong><strong id="nomCaja"><?php echo $_GET['nomCaja']?></strong><strong id="nCaja" style="display: none"><?php echo $_GET['id']?></strong>
                                                            <strong id="idMesa" style="display:none"><?php echo $idMesa;?></strong></td>
                                                            <td>ID venta: <strong name="id_venta" id="id_venta">CARGANDO...</strong></td>
                                                            <td>Caja/turno: <strong name="nombreCaja" id="nombreCaja">CARGANDO...</strong></td>
                                                            <td>N° de Productos: <strong name="nProd" id="nProd">CARGANDO...</strong></td>
                                                            <td><strong name="id_caja" id="id_caja" style="display: none"></strong></td>
                                                        </tr>
                                                    </table> 
                                                </div>
                                                <div id="imprimirBoleta" class="card-body">
                                                    <div class="row" id="">
                                                        <table class="table table-hover responsive" width="100%" id="tablaVentas">
                                                            <th>Atención</th>
                                                            <th>Pedido</th>
                                                            <th>Tipo</th>
                                                            <th>Cant</th>
                                                            <th>Valor</th>
                                                            <th>Estado</th>
                                                            <th>Fecha</th>
                                                            <th>- Ó +</th>
                                                            <th>Eliminar</th>
                                                            <tbody id="ventas" class="table-hover ">
                                                                <tr>
                                                                    <td>Cargando...</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <?php require_once 'items_index/modulo_pago/modulo_pago.php'?>
                    </div>
                </div>
                
            </div>
        </div>
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
    <script src='../../../js/fullcalendar/dist/fullcalendar.js' type='text/javascript'></script>;

    <!--llamada a ventas-->
    <script src="js/descuento/cargarDescuento.js"></script>
    <script src="js/descuento/aplicarDescto.js"></script>
    <script src="../../../js/validarRut.js"></script>
    <script src="js/venta/anularVenta.js"></script>
    <script src="js/correlativo/correlativo.js"></script>
    <script src="js/caja_atencion/cerrarCaja.js"></script>
    <script src="js/venta/cargarIDVenta.js"></script>
    <script src="js/fecha_hora/getFechaHora.js"></script>
    <script src="js/stock/comprobar_estado_stock_minimo.js"></script>
    <script src="js/turno/cargarNombreIdCajaAbierta.js"></script>
    <script src="js/metodoPago/cargarMetodoPago.js"></script>
    <script src="js/metodoPago/metodo_pago_cuenta/cargarMetodoPago.js"></script>
    <script src="js/producto/cargarProducto.js"></script>
    <script src="js/venta/cargarVentasCaja.js"></script>
    <script src="js/venta/clave_aut/clave_aut.js"></script>
    <script src="js/venta/eliminarVenta.js"></script>
    <script src="js/imprimir/primera_impresion/imprCtaGeneral.js"></script>
    <script src="js/cantidad/modificarCant.js"></script>
    <script src="js/metodoPago/validarMetodoPago.js"></script>
    <script src="js/permisos/permisos.js"></script>
    <script src="js/cantidad/comprobarCantidad.js"></script>
    <script src="js/venta/verificar_id_crear_venta.js"></script>
    <script src="js/venta/ventas.js"></script>
    <script src="js/pistola/pistolaCodigoBarra.js"></script>
    <script src="js/venta/registrarVenta.js"></script>
    <script src="js/stock/cargarNumeroStockMinimo.js"></script>
    <script src="js/imprimir/primera_impresion/imprimir.js"></script>
    <script src="js/cliente/datosCliente.js"></script>
    <script src="js/cliente/agregarCliente.js"></script>
    <script src="js/rut/validarVariableRut.js"></script>
    <script src="js/cliente/agregarACuentaCliente.js"></script>
    <script src="js/pagos/cuentas/confirmar_paga_cuenta.js"></script>
    <script src="js/pagos/cuentas/pagarCuenta.js"></script>
    <script src="js/pagos/confirmarPaga.js"></script>
    <script src="js/vuelto/calcularVuelto.js"></script>
    <script src="js/caja_atencion/resumenCaja.js"></script>
    <script src="js/precio/consultarPrecio.js"></script>
    <script src="js/venta/comprobarPrimeraVenta.js"></script>
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
    
    
</body>

</html>
