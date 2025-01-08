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
                    <?php
                        require "../aviso_pago/dom/alert.php";
                    ?>
                    <div class="col-lg-12">
                        <div id="pantallaPrincipal" class="plan">
                            <div class="col-md-12">
                                <div class="card card-warning" id="${task.id}">
                                    <div class="card-header">
                                        <?php
                                            require "productos/modals/modal_abrir_detalles.php";
                                            require "productos/modals/modal_editar.php";
                                            require "productos/modals/modal_registro.php";
                                            echo modalRegistro();
                                            echo modalEditar();
                                            echo modalAbrirDetalles();
                                        ?>

                                        <!--TABLAS O PESTAÑAS-->
                                        <div id="pestañas">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#productos" data-toggle="tab">Clientes</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#promociones" data-toggle="tab">Planes</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content">
                                        <!--Contenido pestañas-->
                                        <?php require "index/productos.php";?>
                                        <?php require "index/promociones.php";?>
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
    <?php require "../cdn_css/cdn/cdn_item.php";?></body>

    <script src="../../../datatables/datatables.js"></script>


    <!--SCRIPTS DE PRODUCTOS-->
    <script src="productos/js/crear/crear_producto.js"></script>
    <script src="productos/js/editar/editar_producto.js"></script>
    <script src="productos/js/eliminar/eliminar_producto.js"></script>
    <script src="productos/js/leer/abrir_detalles.js"></script>
    <script src="productos/js/leer/calcular_ganancia.js"></script>
    <script src="productos/js/leer/categoria_producto_especifico.js"></script>
    <script src="productos/js/leer/categorias.js"></script>
    <script src="productos/js/leer/imprimir_precios.js"></script>
    <script src="productos/js/leer/medida_producto_especifico.js"></script>
    <script src="productos/js/leer/producto.js"></script>
    <script src="productos/js/leer/proveedores.js"></script>
    <script src="productos/js/leer/seleccionar_producto_especifico.js"></script>
    <script src="productos/js/leer/unidades.js"></script>
    <script src="productos/js/leer/validar_existencia_producto.js"></script>
    <script src="productos/js/leer/validar_pesaje.js"></script>
    <script src="productos/js/leer/configuracion_productos.js"></script>
    <script src="productos/js/switches/switch_pesaje_editar.js"></script>
    <script src="productos/js/switches/switch_pesaje.js"></script>
</html>
