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

    <title>YaganERP Venta CAJA <?php echo $_GET['nomCaja']?></title>

    <?php require "../cdn_css/css/css_item.php";?>
    
    <link rel='stylesheet' href='ventas.css'>


</head>

<body>
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
                                                <table width="100%">
                                                    <tr>
                                                        <td align="left" width="40px">
                                                            <label name="lblCantidad">Cód barra</label>
                                                        </td>
                                                        <td align="left" width="">
                                                            <input type="text" name="cod_barra" id="txtCodBarra" class="form form-control" placeholder="Haga click acá y escanée el código de barra">
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
                                                            <button id="btnAgregarVenta" class="btn btn-success agregar" disabled=true>Agregar</button>
                                                        </td>
                                                        <td>
                                                            <button id="btnCrearVenta" class="btn btn-warning agregar" disabled=true>Crear nueva venta</button>
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
                                                            <td><strong name="id_caja" id="id_caja" style="display: none"></strong></td>
                                                        </tr>
                                                    </table> 
                                                </div>
                                                <div id="imprimirBoleta" class="card-body">
                                                    <div class="row" id="">
                                                        <table class="table table-hover" width="100%" id="tablaVentas">
                                                            <th>Atención</th>
                                                            <th>Pedido</th>
                                                            <th>Tipo</th>
                                                            <th>Cant</th>
                                                            <th>Valor</th>
                                                            <th>Estado</th>
                                                            <th>Fecha</th>
                                                            <th>+O-</th>
                                                            <th>Eliminar</th>
                                                            <th>Imprimir</th>
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
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="plan">
                                                <div class="col-md-12">
                                                    <div class="card card-warning">
                                                        <div class="card-header">Imprimir/pagar cuentas</div>
                                                            <div class="card-body">
                                                                <div class="row" id="">
                                                                    
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
                        <div id="divPagar" class="col-sm-3 item-fijado">
                            <h1>Pagar</h1>
                            <div class="plan">
                                <div class="col-md-12">
                                    <div class="card card-warning">
                                        <div class="card-header">Anular</div>
                                            <div class="card-body">
                                                <table class="table">
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
                                                            <strong>TOTAL</strong>
                                                        </td>
                                                        <td>
                                                            <p><strong>$</strong><strong id="totalVenta">ESPERANDO...</strong></p>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table width="100%">
                                                    <tr width="100%">
                                                        <td width="100%"><button id="imprimirBoleta" class="btn btn-success" id="btnPagar" disabled="true" >Boleta</button></td>
                                                        <td width="100%"><button id="pagarVenta" class="btn btn-success" id="btnPagar" disabled="true" >Pagar</button></td>
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
    <script src="js/cargarIDVenta.js"></script>
    <script src="js/getFechaHora.js"></script>
    <script src="js/comprobar_estado_stock_minimo.js"></script>
    <script src="js/cargarNombreIdCajaAbierta.js"></script>
    <script src="js/cargarMetodoPago.js"></script>
    <script src="js/cargarProducto.js"></script>
    <script src="js/cargarVentasCaja.js"></script>
    <script src="js/checkboxGroupCuentaGeneral.js"></script>
    <script src="js/eliminarVenta.js"></script>
    <script src="js/imprCtaGeneral.js"></script>
    <script src="js/modificarCant.js"></script>
    <script src="js/validarMetodoPago.js"></script>
    <script src="js/permisos.js"></script>
    <script src="js/anularVenta.js"></script>
    <script src="js/comprobarCantidad.js"></script>
    <script src="js/ventas.js"></script>
    <script src="js/scroll.js"></script>
    <script src="js/pistolaCodigoBarra.js"></script>
    
    
</body>

</html>
