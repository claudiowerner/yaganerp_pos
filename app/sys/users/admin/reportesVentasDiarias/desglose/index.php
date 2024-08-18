<?php
  session_start();
  $nomCaja = $_GET['nomCaja'];
  $idCierre = $_GET['idCierre'];
  
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

    <?php require "../../cdn_css/css/css_sub_item.php";?>
    
    <link rel="stylesheet" href="../css/estadoItem.css">


</head>

<body role="document">

<strong id="idCierre" style="display: none"><?php echo$idCierre?></strong>
    <?php require "../../menu/sesion_sub_item.php";?>
    <!-- END OF TOPNAV -->
    <!-- Comtainer -->
    <div class="container-fluid paper-wrap bevel tlbr">

        <!-- SIDE MENU -->
        <div class="wrap-sidebar-content">
            <?php 
                require "../../menu/menu_sub_item.php";
                require "../../menu/top_menu_sub_item.php";
            ?>
            <!-- CONTENT -->
            <div class="wrap-fluid" id="paper-bg">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="pantallaPrincipal" class="plan">
                            <div class="col-md-12">
                                <div class="card card-warning" id="${task.id}">
                                    <div class="card-header">
                                        <h1>Detalle de venta turno/caja <br><strong id=nomCaja ><?php echo $nomCaja?></strong></h1>
                                        <strong id="idCierre" style="display:none"><?php echo$idCierre?></strong>
                                        
                                        <div class="col-md-12" style="width:100%" align=center>
                                    </div>
                                    <div class="col-md-12">
                                        </table>
                                        <table id="desgloseCaja" class="table table-bordered table-hover dt-resposive display nowrap">
                                        <thead>
                                            <tr>
                                                <th>Caja</th>
                                                <th>Estado</th>
                                                <th>Valor generado</th>
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
    <?php require "../../cdn_css/cdn/cdn_sub_item.php";?>
    <!--Datatables-->
    <script type="text/javascript" src="../../../../datatables/datatables.js"></script>


    <!--llamada a categorias-->
    <script src="desglose.js"></script>
    <script src="../js/id_usuario.js"></script>
    <script src="../js/imprimir.js"></script>

</body>

</html>
