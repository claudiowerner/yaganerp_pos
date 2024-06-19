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
    
    <link rel='stylesheet' href='ventas.css'>


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
                    <?php
                        require_once "../menu/top_menu_item.php";
                        require_once "modal.php";

                        echo modalSolicitarAutorizacion();
                        echo modalAnular();
                        echo modalCambiarCantidad();
                        echo modalCambiarCantidadPesaje();
                        echo modalMetodoPago();
                        echo modalAñadirCuenta();
                        echo modalAgregarCliente();
                        echo modalPagarCuenta();
                        echo modalSeleccionarCuenta();
                        echo modalMetodoPagoPagarCuenta();
                        echo modalDescuento();
                        echo modalResumenCaja();
                        echo modalConsultarPrecio();
                        echo modalCajaInicial();
                        echo modalMovimientoCaja();
                        echo modalResumenCierreCaja();
                    ?>
                </div>
                <!-- CONTENT -->
                <div class="wrap-fluid" id="paper-bg">
                    <div class="row">
                        <div class="col-sm-9">
                            <h1>Ventas</h1>
                            <strong id="id_usuario" style="display: none"><?php echo $id_us?></strong>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="plan">
                                        <div class="col-md-12" id="div_ventas">
                                            <div class="card card-warning">
                                                <div class="card-header" style="align:left;">
                                                </div>
                                                <table>
                                                    <tr width="100%">
                                                        <td>
                                                            <button id="btnCrearVenta" class="btn btn-warning" style="width:100%" disabled=true>Crear nueva venta</button>
                                                        </td>
                                                        <td>
                                                            <button id="btnCerrarCaja" class="btn btn-danger" style="width:100%">Cerrar caja</button>
                                                        </td>
                                                        <td>
                                                            <button id="btnMovimientoCaja" class="btn btn-primary" style="width:100%">Movimiento de caja</button>
                                                        </td>
                                                        <td>
                                                            <button id="btnResumen" class="btn btn-primary" style="width:100%">Resumen</button>
                                                        </td>
                                                        <td>
                                                            <button id="btnPagarCuenta" class="btn btn-success" style="width:100%">Pagar cuenta</button>
                                                        </td>
                                                        <td>
                                                            <button id="btnConsultarPrecio" class="btn btn-primary" style="width:100%">Consultar precio</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table width="100%">
                                                    <tr>
                                                        <td align="left" width="">
                                                            <label name="lblCantidad">Producto</label>
                                                        </td>
                                                        <td align="left" width="100%">
                                                            <select id="prod" class="form form-control" onChange="productoValido()">
                                                            </select>
                                                        </td>
                                                        
                                                        <td align="left" width="40px">
                                                            <label name="lblCantidad">Cantidad</label>
                                                        </td>
                                                        <td>
                                                            <button type="button" id="restarCant" class="btn btn-danger">
                                                            <img src="../../../img/restar.png" width="10">
                                                            </button>
                                                            <strong id="cantProd">1</strong>
                                                            <button type="button" id="sumarCant" class="btn btn-success">
                                                            <img src="../../../img/sumar.png" width="10">
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <button id="venta" name="agregar" class="agregar btn btn-success" disabled>Agregar</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" width="40px">
                                                            <label name="lblCantidad">Código de barra</label>
                                                        </td>
                                                        <td align="left" width="">
                                                            <input type="text" name="cod_barra" id="txtCodBarra" class="form form-control" placeholder="Haga click acá y escanée el código de barra">
                                                        </td>
                                                    </tr>
                                                </table>
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
                        <div id="divPagar" class="col-sm-3 item-fijado">
                            <h1>Pagar</h1>
                            <div class="plan">
                                <div class="col-md-12">
                                    <div class="card card-warning">
                                        <div class="card-header">Anular</div>
                                            <div class="card-body">
                                                <table class="table table-hover responsive">
                                                    <tr>
                                                        <td colspan="9" align="right">
                                                            <strong>SUB TOTAL:</strong>
                                                        </td>
                                                        <td>
                                                            <p><strong>$</strong><strong id="subtotal">ESPERANDO...</strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="9" align="right">
                                                            <strong>IVA (19%):</strong>
                                                        </td>
                                                        <td>
                                                            <p><strong>$</strong><strong id="iva">ESPERANDO...</strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="9" align="right">
                                                            <strong>DESCTO (<strong id='descuento'>...</strong>%)</strong>
                                                        </td>
                                                        <td>
                                                            <p><strong>$</strong><strong id="totalDescuento">ESPERANDO...</strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="9" align="right">
                                                            <strong>TOTAL</strong>
                                                        </td>
                                                        <td>
                                                            <p><strong>$</strong><strong id="totalVenta">ESPERANDO...</strong></p>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table width="100%">
                                                    <tr>
                                                        <td><button id="btnAnularVenta" class="btn btn-warning anularVenta" style="width: 100%">Anular venta</button></td>
                                                        <td><button id="btnAñadirCuenta" class="btn btn-success" id="btnPagar" disabled="true" style="width: 100%">Añadir a la cuenta</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan=2><button id="btnAplicarDescto" class="btn btn-success" style="width: 100%">Aplicar descuento</button></td>
                                                    </tr>
                                                    <tr>
                                                    <td colspan=2><button id="pagarVenta" class="btn btn-success" disabled="true" style="width: 100%">Pagar</button></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    
    <!--Datatables-->
    <script type="text/javascript" src="../../../datatables/datatables.js"></script>

    <!--Select2-->
    <script type="text/javascript" src="../../../js/select2.js"></script>

    <!--llamada a ventas-->
    <script src="js/descuento/cargarDescuento.js"></script>
    <script src="js/descuento/aplicarDescto.js"></script>
    <script src="../../../js/validarRut.js"></script>
    <script src="js/ventas/anularVenta.js"></script>
    <script src="js/correlativo/correlativo.js"></script>
    <script src="js/caja_atencion/cerrarCaja.js"></script>
    <script src="js/venta/cargarIDVenta.js"></script>
    <script src="js/fecha_hora/getFechaHora.js"></script>
    <script src="js/stock/comprobar_estado_stock_minimo.js"></script>
    <script src="js/turno/cargarNombreIdCajaAbierta.js"></script>
    <script src="js/metodoPago/cargarMetodoPago.js"></script>
    <script src="js/producto/cargarProducto.js"></script>
    <script src="js/venta/cargarVentasCaja.js"></script>
    <script src="js/venta/eliminarVenta.js"></script>
    <script src="js/imprimir/imprCtaGeneral.js"></script>
    <script src="js/cantidad/modificarCant.js"></script>
    <script src="js/metodoPago/validarMetodoPago.js"></script>
    <script src="js/permisos/permisos.js"></script>
    <script src="js/cantidad/comprobarCantidad.js"></script>
    <script src="js/venta/verificar_id_crear_venta.js"></script>
    <script src="js/venta/ventas.js"></script>
    <script src="js/pistola/pistolaCodigoBarra.js"></script>
    <script src="js/venta/registrarVenta.js"></script>
    <script src="js/stock/cargarNumeroStockMinimo.js"></script>
    <script src="js/imprimir/imprimir.js"></script>
    <script src="js/cliente/datosCliente.js"></script>
    <script src="js/cliente/agregarCliente.js"></script>
    <script src="js/rut/validarVariableRut.js"></script>
    <script src="js/cliente/agregarACuentaCliente.js"></script>
    <script src="js/pagos/pagarCuenta.js"></script>
    <script src="js/pagos/confirmarPaga.js"></script>
    <script src="js/vuelto/calcularVuelto.js"></script>
    <script src="js/caja_atencion/resumenCaja.js"></script>
    <script src="js/precio/consultarPrecio.js"></script>
    <script src="js/venta/comprobarPrimeraVenta.js"></script>
    <script src="js/caja_dinero/confirmarMontoInicialCaja.js"></script>
    <script src="js/caja_atencion/movimientoCaja.js"></script>
    <script src="js/producto/descontar_producto.js"></script>
    <script src="js/stock/cargar_stock_minimo.js"></script>
    
    
</body>

</html>
