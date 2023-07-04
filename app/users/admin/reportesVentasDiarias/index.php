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

    <title>YaganERP Administrador</title>

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
                        <div class="plan">
                            <div class="col-md-12">
                                <div class="card card-warning" id="${task.id}">
                                    <div class="card-header">
                                    <h1>Reporte de caja diaria</h1>
                                        <button id="btnCrearCajaNueva" class="btn btn-success" >Abrir caja</button>
                                        <div class="col-md-12" style="width:100%" align=center>
                                            <table>
                                            <tr>
                                                <td><strong>Desde</strong></td>
                                                <td><input type="calendar" name="fechaDesde" id="fechaDesde" class="form-control" placeholder="DD-MM-AAAA"></td>
                                                <td><strong>Hasta</strong></td>
                                                <td><input type="text" name="fechaHasta" id="fechaHasta" class="form-control" placeholder="DD-MM-AAAA"></td>
                                            </tr>
                                            </table>
                                        </div>
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
    <script src="repVentas.js"></script>

</html>
