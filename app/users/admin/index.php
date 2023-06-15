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

    <title>YaganERP Administrador</title>

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
                                        <canvas id="grafic" style="width:10px"></canvas>
                                        </div>
                                        <div class="card-body" id="grafico">
                                        <span align="center">
                                            Ventas por día
                                            <select id="ventasPorDia" class="form-control" onChange="cambioFecha()">
                                            </select>
                                        </span>
                                        <canvas id="gananciaHora" style="width:10px"></canvas>
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
    <?php require "cdn_css/cdn/cdn_index.php";?>





</body>

</html>
