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

    <title>YaganERP Venta MESA <?php echo $_GET['id']?></title>

    <?php require "../cdn_css/css/css_item.php";?>


</head>

<body role="document">
    <span id="opcion" style="display:none">2</span>

    <?php require "../menu/sesion_item.php";?>
    <!-- END OF TOPNAV -->
    <!-- Comtainer -->
    <div class="container-fluid paper-wrap bevel tlbr">

        <!-- SIDE MENU -->
        <div class="wrap-sidebar-content">
        <?php
            require_once "../menu/top_menu_item.php";
            require_once "modal.php";

            echo modalSolicitarAutorizacion();
            echo modalAnular();
            echo modalCambiarMesa();
            echo modalUnificarMesa();
            echo modalSepararMesa();
            echo modalCambiarCantidad();
            echo modalImprimirCtaGral();
            echo modalImprimirCtaIndividual(); 
            echo modalUnificarSeparar();   
        ?>
        <!-- CONTENT -->
        <div class="wrap-fluid" id="paper-bg">
            <h1>Ventas</h1>
            <strong id="id_usuario" style="display: none"><?php echo $id_us?></strong>
            <div  class="row">
                <div class="col-lg-12">
                    <div class="plan">
                        <div class="col-md-12" id="div_ventas">
                            <div class="card card-warning">
                                <div class="card-header" style="align:left;">
                            </div>
                            <table width="100%">
                                <tr>
                                    <td>
                                        <label name="lblProd">Producto</label>
                                    </td>
                                    <td>
                                        <select name="slctProd" id="prod" class="form-control" style="width: 300px" onChange="productoValido()">
                                        </select>
                                    </td>
                                    <td>
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
                                        <label>Observaciones</label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="observaciones" id="obs">
                                    </td>
                                    <td>
                                        <button id="btnAgregarVenta" class="btn btn-success" disabled=true>Agregar</button>
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
                                        <td>Venta <strong>MESA </strong><strong id="nomMesa"><?php echo $_GET['nomMesa']?></strong><strong id="nMesa" style="display: none"><?php echo $_GET['id']?></strong>
                                        <strong id="idMesa" style="display:none"><?php echo $idMesa;?></strong></td>
                                        <td>Piso <strong name="piso" id="piso">CARGANDO...</strong></td>
                                        <td>Ubicación <strong name="ubicacion" id="ubicacion">CARGANDO...</strong><strong id="idUbic" style="display:none"><?php echo $_GET["idUbic"]?></strong></td>
                                        <td>ID venta: <strong name="id_venta" id="id_venta">CARGANDO...</strong></td>
                                        <td>
                                            Tipo de venta:
                                            <strong name="id_venta" id="tipoDeVenta">
                                                <?php
                                                    if($tipoVenta=="N")
                                                    {
                                                        echo "Normal";
                                                    }
                                                    if($tipoVenta=="C")
                                                    {
                                                        echo "Convenio";
                                                    }
                                                    if($tipoVenta==null)
                                                    {
                                                        echo "N/Iden";
                                                    }
                                                ?>
                                            </strong>
                                            <strong id="tv" style="display: none"><?php echo$tipoVenta?></strong>
                                        </td>
                                        <td>Caja/turno: <strong name="nombreCaja" id="nombreCaja">CARGANDO...</strong></td>
                                        <td><strong name="id_caja" id="id_caja" style="display: none"></strong></td>
                                    </tr>
                                </table> 
                            </div>
                            <div class="card-body">
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
                <div class="col-lg-3">
                    <div class="plan">
                        <div class="col-md-12">
                            <div class="card card-warning">
                                <div class="card-header">Imprimir comandas</div>
                                    <div class="card-body">
                                        <div class="row" id="">
                                            <table width="100%">
                                                <tr>
                                                    <td>
                                                        <button id="btnComandaCocina" class="btn btn-success" style="width: 100px;" disabled>A cocina</button>
                                                    </td>
                                                    <td>
                                                        <button id="btnComandaBar" class="btn btn-success" style="width: 100px;" disabled>A bar</button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="plan">
                            <div class="col-md-12">
                                <div class="card card-warning">
                                    <div class="card-header">Imprimir/pagar cuentas</div>
                                    <div class="card-body">
                                        <div class="row" id="">
                                            <table width="100%">
                                                <tr>
                                                    <td><button class="btn btn-success" id="imprCuentaGeneral" style="width: 100px;" disabled="true" >General</button></td>
                                                    <td><button class="btn btn-success" id="imprCtaIndividual" style="width: 100px;" disabled="true">Individual</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3">
                    <div class="plan">
                        <div class="col-md-12">
                            <div class="card card-warning">
                            <div class="card-header">Anular</div>
                                <div class="card-body">
                                    <div class="row" id="div_anular">
                                        <table width="100%">
                                            <tr>
                                                <td><button class="btn btn-success" id="btnCerrar" style="width: 100px;">Cerrar venta</button></td>
                                                <td><button class="btn btn-warning" id="btnAnular" disabled="true" style="width: 100px;">Anular</button></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="plan">
                        <div class="col-md-12">
                            <div class="card card-warning">
                                <div class="card-header">Actividades de mesa</div>
                                    <div class="card-body">
                                        <div class="row" id="div_cambiarMesa">
                                            <table width="100%">
                                                <tr>
                                                    <td><button id="btnUnifSepararMesas" class="btn btn-success" style="width: 100px;">Acción mesas</button></td>
                                                    <td><button class="btn btn-success" style="width: 100px;" data-target="#cambiarMesa" data-toggle="modal">Cambiar</button></td>
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
    <script src="js/ventas.js"></script>
    <script src="js/cambioMesa.js"></script>
    <script src="js/cargarCuentaInd.js"></script>
    <script src="js/cargarNombreIdCajaAbierta.js"></script>
    <script src="js/valorVentaInd.js"></script>
    <script src="js/cargarMetodoPago.js"></script>
    <script src="js/cargarNroPisoUbicacion.js"></script>
    <script src="js/cargarMesasSeparar.js"></script>
    <script src="js/cargarMesasUnificar.js"></script>
    <script src="js/cargarProducto.js"></script>
    <script src="js/cargarVentaGeneral.js"></script>
    <script src="js/cargarVentaInd.js"></script>
    <script src="js/cargarVentasMesa.js"></script>
    <script src="js/checkboxGroupCuentaGeneral.js"></script>
    <script src="js/checkCtaIndividual.js"></script>
    <script src="js/checkPropinaIndividual.js"></script>
    <script src="js/comandas.js"></script>
    <script src="js/eliminarVenta.js"></script>
    <script src="js/imprCtaGeneral.js"></script>
    <script src="js/imprCtaInd.js"></script>
    <script src="js/listarMesas.js"></script>
    <script src="js/modificarCant.js"></script>
    <script src="js/validarMetodoPago.js"></script>
    <script src="js/separarMesas.js"></script>
    <script src="js/unificarMesas.js"></script>
    <script src="js/permisos.js"></script>
    <script src="js/anularVenta.js"></script>
    <script src="js/cargarNomMesa.js"></script>
    <script src="js/comprobarCantidad.js"></script>
</body>

</html>
