<?php
  session_start();
  $idCaja = $_GET['id'];
  $idCierre = $_GET['idCierre'];
  $nomCaja = $_GET['nomCaja'];
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

    <?php require "../../../cdn_css/css/css_sub_sub_item.php";?>
    
    <link rel="stylesheet" href="../css/estadoItem.css">


</head>

<body role="document">

    <?php require "../../../menu/sesion_sub_sub_item.php";?>
    <!-- END OF TOPNAV -->
    <!-- Comtainer -->
    <div class="container-fluid paper-wrap bevel tlbr">

        <!-- SIDE MENU -->
        <div class="wrap-sidebar-content">
            <?php 
                require "../../../menu/menu_sub_sub_item.php";
                require "../../../menu/top_menu_sub_sub_item.php";
            ?>
            <!-- CONTENT -->
            <div class="wrap-fluid" id="paper-bg">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="plan">
                            <div class="col-md-12">
                                <div class="card card-warning" id="${task.id}">
                                    <div class="card-header">
                                        <h1>Detalle de venta turno/caja <strong id=nCaja style="display: none"><?php echo $idCaja?></strong> <strong id=nomCaja><?php echo $nomCaja?></strong></h1>
                                        <strong id="idCierre" style="display: none"><?php echo $idCierre?></strong>
                                        <div class="col-md-12" style="width:100%" align=center>
                                        <!--<table>
                                            <tr>
                                                <td><strong>Desde</strong></td>
                                                <td><input type="calendar" name="horaDesde" id="horaDesde" class="form-control" placeholder="HH:MM:SS"></td>
                                                <td><strong>Hasta</strong></td>
                                                <td><input type="text" name="horaHasta" id="horaHasta" class="form-control" placeholder="HH:MM:SS"></td>
                                            </tr>
                                        </table>-->
                                    </div>
                                    <div class="col-md-12">
                                        <table id="desgloseCaja" class="table table-bordered table-hover dt-resposive display nowrap">
                                            <thead>
                                                <tr>
                                                    <th>ID venta</th>
                                                    <th>Creado por</th>
                                                    <th>Fecha y hora de pago</th>
                                                    <th>Estado</th>
                                                    <th>Valor total</th>
                                                    <th>Método de pago</th>
                                                    <th>Ver detalle</th>
                                                </tr>
                                            </thead>
                                            <tbody id="bodyDetalleCaja">
                                                    
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--<button id="btnReimprimirResumen" class="btn btn-success">Reimprimir resumen de ventas</button>-->
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
    <?php require "../../../cdn_css/cdn/cdn_sub_sub_item.php";?>
    <!--Datatables-->
    <script type="text/javascript" src="../../../../datatables/datatables.js"></script>


    <!--llamada a categorias-->
    <script src="desgloseCaja.js"></script>
    <script src="../../js/id_usuario.js"></script>
    <script src="../../js/imprimir.js"></script>

</body>

</html>
