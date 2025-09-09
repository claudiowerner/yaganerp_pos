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
    <link rel="stylesheet" href="css/estadoItem.css">

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
                <div class="row">
                    <div class="col-lg-12">
                        <div id="pantallaPrincipal" class="plan">
                            
                            <div class="col-md-12">
                                <div class="card card-warning" id="${task.id}">
                                    <div class="card-header">
                                        <h1>Reporte de caja diaria</h1>
                                        <button id="btnCrearCajaNueva" class="btn btn-success" >Abrir caja</button>
                                        <table id="cierreCaja" class="table table-bordered table-hover dt-resposive display nowrap">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nombre</th>
                                                    <th>Creado por</th>
                                                    <th>Desde</th>
                                                    <th>Hasta</th>
                                                    <th>Estado</th>
                                                    <th>Valor total</th>
                                                    <th>Cerrar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="bodyCierreCaja">
                                                
                                            </tbody>
                                        </table>
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

    
    
    <!--Crear caja-->
    <script src="js/crear/crear_caja.js"></script>
    <script src="js/crear/crear_caja_ajax.js"></script>
    
    <!--Leer-->
    <script src="js/leer/validar_solicitud_clave.js"></script>
    <script src="js/leer/validar_cajas_venta_abiertas.js"></script>
    <script src="js/leer/abrir_desglose.js"></script>
    <script src="js/leer/leer_cierres_caja_ajax.js"></script>
    <script src="js/leer/leer_cierres_caja_ajax_filtrados.js"></script>
    <script src="js/leer/validar_clave_autorizacion.js"></script>
    <script src="js/leer/cargar_cierres_caja.js"></script>
    <script src="js/leer/cargar_cierres_caja.js"></script>
    <script src="js/leer/id_usuario.js"></script>
    <script src="js/leer/imprimir.js"></script>
    <script src="js/leer/cierre_caja.js"></script>
    <script src="js/leer/filtro_fechas_cierre_caja.js"></script>

    <!--Editar caja-->
    <script src="js/editar/validar_cierre_caja.js"></script>
    <script src="js/editar/editar_caja.js"></script>
    <script src="js/editar/editar_caja_ajax.js"></script>
    <script src="js/editar/abrir_modal_editar.js"></script>
    <script src="js/editar/cerrar_caja.js"></script>
    <!--Main-->
    <script src="js/main/main.js"></script>
    

</html>
