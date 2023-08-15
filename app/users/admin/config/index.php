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
                require "modal.php";
            ?>
            <!-- CONTENT -->
            <div class="wrap-fluid" id="paper-bg">
            <h1>Configuraciones</h1>
            <strong id="id_usuario" style="display: none"><?php echo $id_us?></strong>
            <div  class="row">
                <div class="col-lg-12">
                    <div class="plan" style="cursor:pointer" id="claveAutorizaciones">
                        <div class="col-md-12" id="div_ventas" align="left">
                            <div class="card card-warning">
                                <div class="card-header" style="align:left;">
                            </div>
                            <strong align="left">Clave de autorizaciones ></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" >
            <div class="col-lg-12">
                <div class="plan" id="configCuentas" style="cursor:pointer">
                    <div class="col-md-12">
                        <div class="card card-warning">
                            <div class="card-header" style="align:left;" align="left">
                                <strong align="left" >Configuración de información de cuentas ></strong><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" >
            <div class="col-lg-12">
                <div class="plan" id="configProducto" style="cursor: pointer">
                    <div class="col-md-12">
                        <div class="card card-warning">
                            <div class="card-header" style="align:left;" align="left">
                                <strong>Configuración de stock de productos ></strong><br>
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


    <!--llamada a los archivos .js-->
    <script src="js/clave.js"></script>
    <script src="js/config.js"></script>
    <script src="js/cuentas.js"></script>
    <script src="js/productos.js"></script>
    <script src="js/convenio.js"></script>
</body>

</html>
