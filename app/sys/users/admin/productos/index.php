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
                                            require "modals/modal_abrir_detalles.php";
                                            require "modals/modal_editar.php";
                                            require "modals/modal_registro.php";
                                            echo modalRegistro();
                                            echo modalEditar();
                                            echo modalAbrirDetalles();
                                        ?>

                                        <!--TABLAS O PESTAÑAS-->

                                        <h1 align='left'>Productos y promociones</h1>
                                        <div align='left' class="tab-content">
                                            <button align='left' type="button" class="btn btn-success" id="btnAgregarCategoria">Agregar producto</button>
                                                <property name="characterEncoding" value="UTF-8">

                                                    <table id="producto" class="table table-bordered table-hover dt-resposive display nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Cód. de barra</th>
                                                                <th>Nombre</th>
                                                                <th>Proveedor</th>
                                                                <th>Categoría</th>
                                                                <th>Cantidad</th>
                                                                <th>Valor venta</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </property>
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
    <?php require "../cdn_css/cdn/cdn_item.php";?></body>

    <script src="../../../datatables/datatables.js"></script>
    <script src="js/calcular_ganancia.js"></script>
    <script src="js/proveedores.js"></script>
    <script src="js/unidades.js"></script>
    <script src="js/categorias.js"></script>
    <script src="js/medida_producto_especifico.js"></script>
    <script src="js/categoria_producto_especifico.js"></script>
    <script src="js/seleccionar_producto_especifico.js"></script>
    <script src="js/producto.js"></script>
    <script src="js/crear_producto.js"></script>
    <script src="js/validar_existencia_producto.js"></script>
    <script src="js/editar_producto.js"></script>
    <script src="js/validar_pesaje.js"></script>
    <script src="js/eliminar_producto.js"></script>
    <script src="js/abrir_detalles.js"></script>

</html>
