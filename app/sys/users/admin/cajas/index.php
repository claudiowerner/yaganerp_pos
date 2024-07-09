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
            ?>
            <!-- CONTENT -->
            <div class="wrap-fluid" id="paper-bg">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="plan">
                            <div class="col-md-12">
                                <div class="card card-warning" id="${task.id}">
                                    <div class="card-header" align="left">
                                        <?php
                                            require "modal.php";
                                            echo modalRegistro();
                                            echo modalEditar();
                                        ?>
                                        <h1>Cajas</h1>
                                        <button type="button" class="btn btn-success" id="btnAgregarCaja">Agregar caja</button>
                                        <div align="right">
                                            Cajas activas <b id="cajas_creadas"></b><b>/</b><b id="cajas_permitidas"></b><br>
                                            <strong id="msjeCajasActivas" style="color: red"></strong>
                                        </div>
                                        <property name="characterEncoding" value="UTF-8">

                                            <table id="producto" class="table table-bordered table-hover dt-resposive display nowrap">
                                                <thead>
                                                    <tr>
                                                    <th>Id</th>
                                                    <th>Nombre</th>
                                                    <th>Creado por</th>
                                                    <th>Fecha</th>
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
    <script type="text/javascript" src="../../../datatables/datatables.js"></script>
    <script src="script_js/validar_cajas_activas.js"></script>
    <script src="script_js/cargar_cajas_activas.js"></script>
    <script src="script_js/cargar_cajas_permitidas.js"></script>
    <script src="script_js/caja.js"></script>
    <script src="script_js/editar_caja.js"></script>
    <script src="script_js/crear_caja.js"></script>
    <script src="script_js/eliminar_caja.js"></script>
    <script src="script_js/validar_caja_con_ventas.js"></script>

</html>
