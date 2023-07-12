<?php
  session_start();
  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $piso = 1;
  $idVenta = $_GET['idVenta'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!--   <meta content="IE=edge" http-equiv="X-UA-Compatible"> -->
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="" name="description">
  <meta content="" name="author">
  <link href="ico/favicon.ico" rel="shortcut icon">

  <title>YaganERP Administrador</title>

  <?php require "../../../../cdn_css/css/css_sub_sub_sub_item.php";?>
  <link rel="stylesheet" href="../../../css/estadoItem.css">

  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php require "../../../../menu/sesion_sub_sub_sub_item.php";?>
    <!-- END OF TOPNAV -->
    <!-- Comtainer -->
    <div class="container-fluid paper-wrap bevel tlbr">

        <!-- SIDE MENU -->
        <div class="wrap-sidebar-content">
            <?php 
                require "../../../../menu/menu_sub_sub_sub_item.php";
                require "../../../../menu/top_menu_sub_sub_sub_item.php";
            ?>
            <!-- CONTENT -->
            <div class="wrap-fluid" id="paper-bg">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="plan">
                            <div class="col-md-12">
                                <div class="card card-warning" align="left">
                                    <div class="card-header">
                                    <h1>Detalle de venta <strong id=venta><?php echo $idVenta?></strong></h1>
                                    <table>
                                        <tr>
                                            <td>
                                                <strong>Caja: </strong>
                                            </td>
                                            <td id="nombre_mesa">
                                                CARGANDO...
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Estado de la venta: </strong>
                                            </td>
                                            <td id="estadoVenta">
                                                CARGANDO...
                                            </td>
                                        </tr>
                                    </table>
                                    <table id="desgloseCaja" class="table table-bordered table-hover dt-resposive display nowrap">
                                        <thead>
                                            <tr>
                                                <th>Creado por</th>
                                                <th>Estado</th>
                                                <th>Fecha</th>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Forma pago</th>
                                                <th>Valor</th>
                                                <th>IVA(19%)</th>                                                    <th>Valor total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bodyDesgloseVenta">    
                                        </tbody>
                                    </table>
                                    <div align=right>
                                        *Las ventas anuladas no se consideran en el total de la venta
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
    <?php require "../../../../cdn_css/cdn/cdn_sub_sub_sub_item.php";?>
    <!--Datatables-->
    <script type="text/javascript" src="../../../../datatables/datatables.js"></script>


    <!--llamada a categorias-->
    <script src="desgloseVenta.js"></script>


</body>
</html>
