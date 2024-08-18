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
    <?php 
        require "modals/grafico/año.php";
        require "modals/grafico/mes.php";
        require "modals/grafico/dia.php";
        modalAñoVenta();
        modalMesVenta();
        modalDiaVenta();
    ?>
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
                        <?php
                            require "aviso_pago/dom/alert.php";
                        ?>
                    <div class="col-lg-12">
                        <div id="pantallaPrincipal" class="plan">
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
                                        </span>
                                        <div>
                                            <button id="btnCalendario" class="btn btn-primary">Calendario de ventas</button>
                                        </div>
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
    <script src="graficos/js/grafico/loader.js"></script>
    <script src='graficos/js/grafico/cargar_fechas.js'></script>
    <script src='graficos/js/grafico/grafico_anual.js'></script>
    <script src='graficos/js/grafico/grafico_ventas_hora.js'></script>
    <script src='graficos/js/grafico/cargar_años.js'></script>
    <script src='graficos/js/grafico/graficos.js'></script>


    <!--Calendario de ventas-->
    <script src='graficos/js/calendario/cargar_año_venta.js'></script>
    <script src='graficos/js/calendario/cargar_mes_venta.js'></script>
    <script src='graficos/js/calendario/cargar_dias_venta.js'></script>
    <script src='graficos/js/calendario/calendario.js'></script>






</body>

</html>
