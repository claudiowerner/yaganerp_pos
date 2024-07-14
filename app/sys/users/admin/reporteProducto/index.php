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
                                <div class="card card-warning" id="${task.id}">
                                    <div class="card-header">
                                        <h1>Productos más vendidos</h1>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="#datos_graficados" data-toggle="tab">Datos graficados</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#tabla" data-toggle="tab">Datos tabulados</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div id="datos_graficados" class="tab-pane fade">
                                                <div id="radioButton">
                                                    <div class="col-lg-6 form-check">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="radioGraficoTarta">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Gráfico de tarta
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-6 form-check">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="radioGraficoBarra" checked>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Gráfico de barra
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="graficoCategorias" align='center' class="col-lg-12">
                                                    hola
                                                </div>
                                                <div id="graficoProductos" align='center' class="col-lg-12">
                                                    cmo estas
                                                </div>
                                            </div>
                                            <div id="tabla" class="tab-pane fade">
                                                <table id="cierreCaja" class="table table-bordered table-hover dt-resposive display nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Categoría</th>
                                                            <th>Nombre producto</th>
                                                            <th>Cantidad</th>
                                                            <th>Valor generado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="bodyProductoVendido">
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
    <script src="js/productoVendido.js"></script>
    <script src="js/loader.js"></script>
    <script src="js/graficos/cargar_graficos.js"></script>
    <script src="js/graficos/seleccionar_grafico.js"></script>
    <script src="js/graficos/graficos_tarta/grafico_productos.js"></script>
    <script src="js/graficos/graficos_tarta/grafico_categorias.js"></script>
    <script src="js/graficos/graficos_tarta/tamano_grafico.js"></script>
    <script src="js/graficos/graficos_barra/grafico_productos.js"></script>
    <script src="js/graficos/graficos_barra/grafico_categorias.js"></script>
    <script src="js/graficos/graficos_barra/tamano_grafico.js"></script>
</body>

</html>
