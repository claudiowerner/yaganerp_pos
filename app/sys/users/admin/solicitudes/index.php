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

    <title>.:VendeloPOS Administrador:.</title>

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
                        <div id="pantallaPrincipal" class="plan">
                            <div class="col-md-12">
                                <div class="card card-warning" id="${task.id}">
                                    <div class="card-header" align="left">
                                        <h1>Solicitudes</h1>
                                        <button id="btnActualizar" class="btn btn-primary">Actualizar</button>
                                        <br>
                                        <property name="characterEncoding" value="UTF-8">
                                            <div id="contenido">

                                            </div>
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
    

    <!--Eliminar solicitudes-->
    <script src="script_js/eliminar/eliminar_solicitud.js"></script>

    <!--Editar solicitudes-->
    <script src="script_js/editar/aprobar_solicitud.js"></script>
    <script src="script_js/editar/declinar_solicitud.js"></script>
    
    <!--Leer solicitudes-->
    <script src="script_js/leer/leer_solicitudes.js"></script>
    <script src="script_js/leer/actualizar_tablas.js"></script>
    
    <!--Main-->
    <script src="script_js/main/main.js"></script>

</html>
