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

    <link rel="stylesheet" href="switch.css">

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

                <div  class="row">
                    <div class="col-lg-12">
                        <div class="plan" style="cursor:pointer" id="claveAutorizaciones">
                            <div class="col-md-12" id="div_ventas" align="left">
                                <div class="card card-warning">
                                    <div class="card-header" style="align:left;"></div>
                                <strong align="left">Clave de autorizaciones ></strong>
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
                <div class="plan" id="configMargenGanancia" style="cursor: pointer">
                    <div class="col-md-12">
                        <div class="card card-warning">
                            <div class="card-header" style="align:left;" align="left">
                                    <strong>Configuración de margen de ganancia ></strong><br>
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
        <div class="row" >
            <div class="col-lg-12">
                <div class="plan" id="planContratado" style="cursor: pointer">
                    <div class="col-md-12">
                        <div class="card card-warning">
                            <div class="card-header" style="align:left;" align="left">
                                <strong>Plan contratado ></strong><br>
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


    <!--llamada a los archivos .js-->

    <!-- ARCHIVOS RELACIONADOS LA PANTALLA INICIAL DE CONFIGURACIÓN-->
     
    <script src="js/config.js"></script>
    <script src="js/cargarGiros.js"></script>
    

    <!--ARCHIVOS RELACIONADOS CON LAS CLAVES DE AUTORIZACION-->
    <script src="js/clave/estado_clave.js"></script>
    <script src="js/clave/clave.js"></script>
    <script src="js/clave/crear_clave.js"></script>

    <!--ARCHIVOS RELACIONADOS CON LAS CUENTAS-->
    <script src="js/info_cuentas/cuentas.js"></script>
    <script src="js/info_cuentas/cargar_datos_cuenta.js"></script>
    <script src="js/info_cuentas/validar_correo.js"></script>
    <script src="js/info_cuentas/validar_telefono.js"></script>
    <script src="js/info_cuentas/actualizar_datos_cuenta.js"></script>

    
    <!--ARCHIVOS RELACIONADOS CON LA CONFIGURACIÓN DE MARGEN DE GANANCIA-->
    <script src="js/margen_ganancia/margen_ganancia.js"></script>
    <script src="js/margen_ganancia/cargar_margen_ganancia.js"></script>
    <script src="js/margen_ganancia/crear_margen_ganancia.js"></script>
    
    <!--ARCHIVOS RELACIONADO CON LA CONFIGURACIÓN DE STOCK DE PRODUCTOS-->
    <script src="js/productos/productos.js"></script>
    <script src="js/productos/cargar_datos_stock.js"></script>
    <script src="js/productos/estado_stock_productos.js"></script>
    <script src="js/productos/crear_stock.js"></script>

    <!--ARCHIVOS RELACIONADOS CON EL PLAN CONTRATADO-->
    <script src="js/plan_contratado/cargarPlanContratado.js"></script>

    

</body>

</html>
