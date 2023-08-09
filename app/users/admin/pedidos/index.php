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
                                    <div class="card-header">
                                    <?php
                                        require "modal.php";
                                        echo modalRegistro();
                                        echo modalEditar();
                                        ?>

                                        <div align=left>
                                            <h1>Pedidos</h1>
                                            <button type="button" class="btn btn-success" id="btnAgregarCategoria" data-toggle="modal" data-target="#modalRegistro">Agregar pedido</button>
                                            <table id="pedidos" class="table table-bordered table-hover dt-resposive display nowrap">
                                                <thead>
                                                    <tr>
                                                        <td>ID</td>
                                                        <td>Proveedor</td>
                                                        <td>Estado</td>
                                                        <td>Creado por</td>
                                                        <td>Fecha</td>
                                                        <td>Valor</td>
                                                        <td>Editar</td>
                                                        <td>Imprimir</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
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
    <?php require "../cdn_css/cdn/cdn_item.php";?>
    <!--Datatables-->
    <script type="text/javascript" src="../../../datatables/datatables.js"></script>


    <!--llamada a pedidos-->
    <script src="js/cargarPedidoSolicitado.js"></script>
    <script src="js/agregarPedido.js"></script>
    <script src="js/cargar_proveedores.js"></script>
    <script src="js/pedidos.js"></script>
    <script src="js/imprimir_pedido.js"></script>
    <script src="js/cambiarIdProveedor.js"></script>
</body>

</html>
