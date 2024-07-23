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

  require_once '../../conexion.php';

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

    <?php require "cdn_css/css/css_index.php";?>


</head>

<body role="document">

    <span id=opcion style="display: none">1</span>

    <?php require "menu/sesion_index.php"; ?>
    <!-- Comtainer -->
    <div class="container-fluid paper-wrap bevel tlbr">

        <!-- SIDE MENU -->
        <div class="wrap-sidebar-content">
            <?php 
                require "menu/menu_index.php";
                require "menu/top_menu.php";
            ?>
            <!-- CONTENT -->
            <div class="wrap-fluid" id="paper-bg">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="plan">
                            <div class="col-md-12">
                                <div class="card card-warning" id="${task.id}">
                                    <div class="card-header">
                                        <h3 class="card-title"><strong name="graficos">Gráficos</strong></h3>
                                        </div>
                                        <div class="card-body" id="grafico">
                                        <span align="center">
                                            Ventas por mes
                                            <select id="añoVenta" class="form-control" onchange="crearGrafico()">
                                            </select>
                                        </span>
                                        <div id="ventasAño"></div>
                                        </div>
                                        <div class="card-body" id="grafico">
                                        <span align="center">
                                            Ventas por día
                                            <select id="ventasPorDia" class="form-control" onChange="cambioFecha()">
                                            </select>
                                        </span>
                                        <div id="gananciaHora"></div>
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
    <?php require "cdn_css/cdn/cdn_index.php";?>
    <script src="graficos/js/loader.js"></script>
    <script src='graficos/js/cargar_fechas.js'></script>
    <script src='graficos/js/grafico_anual.js'></script>
    <script src='graficos/js/grafico_ventas_hora.js'></script>
    <script src='graficos/js/cargar_años.js'></script>
    <script src='graficos/js/graficos.js'></script>





</body>

</html>
