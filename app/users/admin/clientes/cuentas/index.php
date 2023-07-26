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


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $piso = 1;

  $rut = $_GET["rut"];

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

    <?php require "../../cdn_css/css/css_sub_item.php";?>


</head>

<body role="document">

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
            <strong id="rut" style="display: none"><?php echo $rut;?></strong>
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

                                        <h1 align="left">Cuentas asociadas a: </h1>
                                        
                                        <div align="left">
                                            <table>
                                                <tr>
                                                    <td><strong>Nombre:</strong></td>
                                                    <td id="nombre">Cargando...</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Apellido:</strong></td>
                                                    <td id="apellido">Cargando...</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <property name="characterEncoding" value="UTF-8">

                                            <table id="producto" class="table table-bordered table-hover dt-resposive display nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Correlativo</th>
                                                        <th>Estado</th>
                                                        <th>Fecha</th>
                                                        <th>Valor</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="bodyCuenta">
                                                    <tr>
                                                        <td colspan=4>Cargando...</td>
                                                    </tr>
                                                </tbody>
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
    <?php require "../../cdn_css/cdn/cdn_sub_item.php";?></body>

    <script type="text/javascript" src="../../../datatables/datatables.js"></script>
    <script src="cuentas.js"></script>

</html>
