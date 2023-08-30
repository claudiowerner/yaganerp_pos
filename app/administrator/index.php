<?php
  session_start();

  /*if(isset($_SESSION['user']))
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
  $piso = 1;
  */

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
                                            echo modalRegistroCliente();
                                            echo modalEditarCliente();
                                            echo modalRegistrarPlan();
                                            echo modalEditarPlan();
                                        ?>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#clientes" data-toggle="tab">Clientes</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#plan_cliente" data-toggle="tab">Planes</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div id="clientes" class="tab-pane fade">
                                                <h1>Clientes</h1>
                                                <button type="button" class="btn btn-success" id="btnAgregarCaja">Agregar cliente</button>
                                                <property name="characterEncoding" value="UTF-8">

                                                    <table id="producto" width="100%" class="table table-bordered table-hover dt-resposive display nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Nombre</th>
                                                                <th>Rut</th>
                                                                <th>Estado</th>
                                                                <th>Correo</th>
                                                                <th>Telefono</th>
                                                                <th>Plan comprado</th>
                                                                <th>Fecha registro</th>
                                                                <th>Paga desde</th>
                                                                <th>Paga hasta</th>
                                                                <th>Estado pago</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </property>
                                            </div>
                                            <div id="plan_cliente" class="tab-pane fade">
                                            <h1>Planes</h1>
                                                <button type="button" class="btn btn-success" id="btnAgregarPlan">Agregar plan</button>
                                                <property name="characterEncoding" value="UTF-8">

                                                    <table id="planes" width="100%" class="table table-bordered table-hover dt-resposive display nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Nombre</th>
                                                                <th>Estado</th>
                                                                <th>Usuarios</th>
                                                                <th>Cajas</th>
                                                                <th>Valor</th>
                                                                <th>Editar</th>
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
    <script src="js/cargarPlanes.js"></script>
    <script src="js/planes.js"></script>
    <script src="js/administrator.js"></script>
    <script src="js/crearEnviarUsuario.js"></script>
    <script src="js/cargarTipoPago.js"></script>
    <script src="../js/validarRut.js"></script>
    

</html>
