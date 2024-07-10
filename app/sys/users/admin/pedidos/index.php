<?php
  session_start();

  if(isset($_SESSION['user']))
  {
    $tipo = $_SESSION['user']['tipo_usuario'];
    if($tipo == 3)
    {
      header('Location: ../');
    }
  }
  else
  {
    header('Location: ../');
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

    <title>.:WebPOS Administrador:.</title>

    <?php require "../cdn_css/css/css_item.php";?>


</head>

<body role="document">

    <?php require "../menu/sesion_item.php";?>
    <!-- END OF TOPNAV -->
    <!-- Comtainer -->
    <div class="container-fluid paper-wrap bevel tlbr">

        <!-- SIDE MENU -->
        <div class="wrap-sidebar-content">
            <?php 
                require "../menu/menu_item.php";
                require "../menu/top_menu_item.php";
            ?>
            <!-- CONTENT -->
            <div class="wrap-fluid" id="paper-bg">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="plan">
                            <div class="col-md-12">
                                <div class="card card-warning" id="">
                                    <div class="card-header">
                                        <?php
                                            require "modal.php";
                                            echo modalRegistro();
                                            echo modalEditar();
                                        ?>

                                        <div align=left>
                                            <h1>Pedidos</h1>
                                            <button type="button" class="btn btn-success" id="btnAgregarPedido">Agregar pedido</button>
                                            <button type="button" class="btn btn-primary" id="btnResumenPedidos">Ver resúmen de pedidos</button>
                                            <div align=right>
                                                Monto total en pedidos HECHOS: <strong id='montoPedido'>CARGANDO...</strong>
                                            </div>
                                            <table id="pedidos" class="table table-bordered table-hover dt-resposive display nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nombre pedido</th>
                                                        <th>Proveedor</th>
                                                        <th>Estado</th>
                                                        <th>Creado por</th>
                                                        <th>Fecha</th>
                                                        <th>Valor</th>
                                                        <th>Pagado</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
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
    <!--Datatables-->
    <script type="text/javascript" src="../../../datatables/datatables.js"></script>


    <!--llamada a pedidos-->
    <script src="js/pedido/detalle_pedido/cargar_detalle_pedido.js"></script>
    <script src="js/pedido/leer/pedidos.js"></script>
    <script src="js/pedido/imprimir/imprimir_pedido.js"></script>
    <script src="js/pedido/leer/cargarMontoTotalPedidos.js"></script>
    <script src="js/pedido/leer/cargarEstadoPedido.js"></script>
    <script src="js/pedido/leer/cargarEstadoPagoPedido.js"></script>
    <script src="js/pedido/leer/cargarFacturaConIva.js"></script>
    <script src="js/pedido/registro_pedido/agregarPedido.js"></script>
    <script src="js/pedido/registro_pedido/finalizar_pedido.js"></script>
    <script src="js/pedido/detalle_pedido/agregar_detalle.js"></script>
    <script src="js/pedido/detalle_pedido/cargar_detalle_pedido.js"></script>
    <script src="js/pedido/detalle_pedido/detalle_pedido.js"></script>
    <script src="js/pedido/detalle_pedido/cargar_nombre_pedido.js"></script>
    <script src="js/pedido/editar_pedido/editar_pedido.js"></script>
    <script src="js/pedido/editar_pedido/editar_estado_pedido.js"></script>
    <script src="js/pedido/editar_pedido/editar_proveedor.js"></script>
    <script src="js/pedido/editar_pedido/editar_estado_pago.js"></script>
    <script src="js/pedido/editar_pedido/editar_factura_iva.js"></script>
    <script src="js/pedido/editar_pedido/abrir_pedido_a_editar.js"></script>
    <script src="js/pedido/leer/obtener_valor_pedido.js"></script>
    <script src="js/pedido/leer/obtener_numero_productos.js"></script>
    <script src="js/pedido/calculo/calcular_valor.js"></script>
    <script src="js/pedido/eliminar/eliminar_pedido.js"></script>
    <script src="js/proveedores/cargar_proveedores.js"></script>
</body>

</html>
