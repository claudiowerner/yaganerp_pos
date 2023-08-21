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

  require_once '../conexion.php';

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

    <?php require "cdn_css/css/css_index.php";?>


</head>

<body role="document">

    <!-- END OF TOPNAV -->
    <!-- Comtainer -->
    <div class="container-fluid paper-wrap bevel tlbr">

        <!-- SIDE MENU -->
        <div class="wrap-sidebar-content">
            <!-- CONTENT -->
            <div class="wrap-fluid" id="paper-bg">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="plan">
                            <div class="col-md-12">
                                <div class="card card-warning" id="${task.id}">
                                    <div class="card-header">
                                        <?php
                                            require "modal.php";
                                            echo modalRegistro();
                                            echo modalEditar();
                                        ?>
                                        <h1>Cajas</h1>
                                        <button type="button" class="btn btn-success" id="btnAgregarCaja">Agregar caja</button>
                                        <property name="characterEncoding" value="UTF-8">

                                            <table id="producto" class="table table-bordered table-hover dt-resposive display nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Nombre</th>
                                                        <th>Rut</th>
                                                        <th>Estado</th>
                                                        <th>Correo</th>
                                                        <th>Telefono</th>
                                                        <th>Plan comprado</th>
                                                        <th>Fecha pago</th>
                                                        <th>Acción</th>
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
    <?php require "cdn_css/cdn/cdn_index.php";?></body>
    <script type="text/javascript" src="../datatables/datatables.js"></script>
    <script src="administrator.js"></script>

</html>
