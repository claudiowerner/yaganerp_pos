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
                                        <div align="center">
                                            <table>
                                                <tr>
                                                    <td><label>Desde</label></td>
                                                    <td><input type="date" id="fecha_inicio" class="form-control" onkeyup="filtrarInformacion()" onchange="filtrarInformacion()"></td>
                                                    <td><label>Hasta</label></td>
                                                    <td><input type="date" id="fecha_fin" class="form-control" onkeyup="filtrarInformacion()" onchange="filtrarInformacion()"></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li id="graficos"class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="#datos_graficados" data-toggle="tab">Datos graficados</a>
                                            </li>
                                            <li id="tablas" class="nav-item">
                                                <a class="nav-link" href="#tabla" data-toggle="tab">Datos tabulados</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div id="datos_graficados" class="tab-pane fade">
                                                <div id="radioButton">
                                                    <div class="col-lg-6">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="radioGraficoBarra" checked>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Gráfico de barra
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-6 form-check">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="radioGraficoTarta">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Gráfico de tarta
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="graficoTartaCategorias" align='center' class="col-lg-12">
                                                    Cargando...
                                                </div>
                                                <div id="graficoTartaProductos" align='center' class="col-lg-12">
                                                    Cargando...
                                                </div>
                                                <div id="graficoBarraCategorias" align='center' class="col-lg-12">
                                                    Cargando...
                                                </div>
                                                <div id="graficoBarraProductos" align='center' class="col-lg-12">
                                                    Cargando...
                                                </div>
                                            </div>
                                            <div id="tabla" class="tab-pane fade">
                                                <div id="divTablaCategorias" class="col-lg-6">
                                                    <div class="col-lg-11">
                                                        <table class="table" border=1>
                                                            <tr align="center">
                                                                <th colspan=2><span>Ventas por categorías</span></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Categoría</th>
                                                                <th>Valor</th>
                                                            </tr>
                                                            <tbody id="tbodyCategorias">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div id="divTablaProductos" class="col-lg-6">
                                                    <div class="col-lg-11">
                                                        <table class="table" border=1>
                                                            <tr align="center">
                                                                <th colspan=3><span>Ventas por productos</span></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Producto</th>
                                                                <th>Número de ventas</th>
                                                                <th>Valor generado</th>
                                                            </tr>
                                                            <tbody id="tbodyProductos">
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
    <script src="../../../js/moment/moment.js"></script>
    <script src="../../../js/numberFormat.js"></script>
    <script src="js/productoVendido.js"></script>
    <script src="js/loader.js"></script>
    <script src="js/graficos/seleccionar_grafico.js"></script>
    <script src="js/graficos/graficos_tarta/info_filtrada/grafico_productos.js"></script>
    <script src="js/graficos/graficos_tarta/info_filtrada/grafico_categorias.js"></script>
    <script src="js/graficos/graficos_tarta/info_filtrada/tamano_grafico.js"></script>
    <script src="js/graficos/graficos_tarta/info_sin_filtrar/grafico_productos.js"></script>
    <script src="js/graficos/graficos_tarta/info_sin_filtrar/grafico_categorias.js"></script>
    <script src="js/graficos/graficos_tarta/info_sin_filtrar/tamano_grafico.js"></script>
    <script src="js/graficos/graficos_barra/info_filtrada/grafico_productos.js"></script>
    <script src="js/graficos/graficos_barra/info_filtrada/grafico_categorias.js"></script>
    <script src="js/graficos/graficos_barra/info_filtrada/tamano_grafico.js"></script>
    <script src="js/graficos/graficos_barra/info_sin_filtrar/grafico_productos.js"></script>
    <script src="js/graficos/graficos_barra/info_sin_filtrar/grafico_categorias.js"></script>
    <script src="js/graficos/graficos_barra/info_sin_filtrar/tamano_grafico.js"></script>
    <script src="js/filtro_informacion/obtener_primer_año_venta.js"></script>
    <script src="js/filtro_informacion/filtrar_informacion.js"></script>
    <script src="js/filtro_informacion/descargar_informacion_ajax.js"></script>
    <script src="js/graficos/cargar_graficos.js"></script>
    <script src="js/tabla/tablas_sin_filtrar/categorias_sin_filtrar.js"></script>
    <script src="js/tabla/tablas_sin_filtrar/productos_sin_filtrar.js"></script>
    <script src="js/tabla/tablas_filtradas/categorias_filtradas.js"></script>
    <script src="js/tabla/tablas_filtradas/productos_filtrados.js"></script>
    <script src="js/tabla/cargar_tablas.js"></script>
</body>

</html>
